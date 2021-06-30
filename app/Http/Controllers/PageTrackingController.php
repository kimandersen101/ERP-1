<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Helpers\NotificationHelper;
use App\StaticDatabase;
use App\UserNotification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\LeadHandoff;
use App\User;
use App\Lead;
use App\PageTracking;
use App\FunnelStep;
use App\Page;
use App\Tag;
use App\TagUser;

class PageTrackingController extends MyController
{
    //
    public function index(Request $request)
    {
        if (!empty($request->page_id)) {
            $page = Page::where('id', '=', $request->page_id)->first();
            $lead = Lead::where('uid', '=', $request->unique_code)->first();
            $user_id = $lead->user_id;

            if (Session::has('admin_id'))
                $actor_id = Session::get('admin_id');
            else
                $actor_id = $lead->user_id;

            $page_tracking = PageTracking::where([
                ['user_id', '=', $lead->user_id],
                ['page_id', '=', $page->id]
            ])->first();

            $tracking = array(
                'user_id' => $lead->user_id,
                'page_id' => $page->id,
                'time_in_seconds' => $request->time_in_second,
                'completed_percent' => $request->viewed
            );

            if ($request->call_to_action)
                $tracking['call_to_action'] = $request->call_to_action;

            if (empty($page_tracking->page_id)) {
                $page_tracking = PageTracking::create($tracking);
                if ($page->type != 'BOOKLET')
                    $this->sendPagePush($lead->user_id, $page->title, $page->type);
            } else {
                $page_tracking->fill($tracking);
                $page_tracking->save();
            }

            $brochure_seconds = StaticDatabase::getSettings()->firstWhere('key', 'brochure_seconds')->value;

            if (!empty($page_tracking->id)) {
                if ($page->type == 'ARTICLE')
                    $this->addActivity($user_id, $actor_id, "faq-completed", $page->title, "landing", "PageTracking", $page_tracking->id);
                if ($page->type == 'BOOKLET' && $tracking['time_in_seconds'] >= $brochure_seconds) {
                    $booklet_activity = Activity::where([['key', 'booklet-completed'], ['user_id', $user_id]])->first();
                    if (empty($booklet_activity))
                        $this->sendPagePush($user_id, $page->title, $page->type);

                    $this->addActivity($user_id, $actor_id, "booklet-completed", $page->title, "landing", "PageTracking", $page_tracking->id);
                }
            }

            if ($page->type == 'ARTICLE') {
                $funnel_step = FunnelStep::where('key', 'article')->first();
                $this->addActivity($user_id, $actor_id, "funnel-step-completed", '', "landing", "FunnelStep", $funnel_step->id);
            }
            if ($page->type == 'BOOKLET' && $tracking['time_in_seconds'] >= $brochure_seconds) {
                $funnel_step = FunnelStep::where('key', 'booklet')->first();
                $this->addActivity($user_id, $actor_id, "funnel-step-completed", '', "landing", "FunnelStep", $funnel_step->id);
            }

            $this->checkFunnelSteps($user_id, $actor_id);
            return response()->json("Success");
        } else {
            return response()->json("Page Not Found");
        }
    }

    private function sendPagePush($user_id, $page_title, $page_type)
    {
        $notification_type = '';
        $notification_data = [];
        $user = User::where('id', $user_id)->first();
        $upline = User::where('id', $user->parent_id)->first();

        if ($page_type == "ARTICLE") {
            $notification_data = ['CONTACT' => $user->name, 'ARTICLE_TITLE' => $page_title];
            $notification_type = 'article-read';
        } else if ($page_type == 'BOOKLET') {
            $notification_data = ['CONTACT' => $user->name, 'USER' => !empty($upline) ? $upline->name : ''];
            $notification_type = 'brochure-read';
        }

        $this->sendPush($user, $notification_data, $notification_type);
    }

    private function sendHotleadPush($user_id)
    {
        $user = User::where('id', $user_id)->first();
        $notification_data = ['CONTACT' => $user->name];
        $this->sendPush($user, $notification_data, 'third-base');
    }

    private function sendKiCompletionPush($user_id)
    {
        $user = User::where('id', $user_id)->first();
        $notification_data = ['CONTACT' => $user->name];
        $this->sendPush($user, $notification_data, 'ki-completed');
    }

    private function sendPush($user, $notification_data, $notification_type)
    {
        $upline = User::where('id', $user->parent_id)->first();

        if (!empty($upline)) {
            $users_to_send = [$upline->id];

            $shared_users = LeadHandoff::where('lead_id', $user->id)->get();
            if ($shared_users) {
                $shared_user_uids = array_column($shared_users->toArray(), 'support_id');
                $users_to_send = array_merge($users_to_send, $shared_user_uids);
            }
        }

        foreach ($users_to_send as $id) {
            NotificationHelper::sendPush($id, $user->id, $notification_type, $notification_data);
        }
    }

    private function checkFunnelSteps($user_id, $actor_id)
    {
        $funnel_complete = Activity::where([['key', 'funnel-completed'], ['user_id', $user_id]])->first();
        if (empty($funnel_complete)) {
            $funnel_step = Activity::where([['key', 'funnel-step-completed'], ['user_id', $user_id]])->get();
            if ($funnel_step->count() == 2) {
                $hot_lead = Activity::where([['key', 'hot-lead'], ['user_id', $user_id]])->first();
                if (empty($hot_lead)) {
                    $tag = Tag::where('key', 'hot-lead')->first();
                    $tag_user['user_id'] = $user_id;
                    $tag_user['tag_id'] = $tag->id;
                    $tag_id = TagUser::firstOrCreate($tag_user)->id;
                    $this->addActivity($user_id, $actor_id, "hot-lead", '', "landing", "TagUser", $tag_id);
                    $this->sendHotleadPush($user_id);
                }
            } else if ($funnel_step->count() == 4) {
                $this->addActivity($user_id, $actor_id, "funnel-completed", '', "landing", null, null);
                $this->sendKiCompletionPush($user_id);
            }
        }
    }

    private function addActivity($user_id, $actor_id, $key, $value, $location, $object, $object_id)
    {
        $activity = compact('user_id', 'actor_id', 'key', 'value', 'location', 'object', 'object_id');

        Activity::firstOrCreate($activity);
    }
}
