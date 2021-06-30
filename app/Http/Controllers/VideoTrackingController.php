<?php

namespace App\Http\Controllers;

use App\Activity;
use App\FunnelStep;
use App\Helpers\NotificationHelper;
use App\LeadHandoff;
use App\StaticDatabase;
use App\Tag;
use App\TagUser;
use App\User;
use App\Video;
use App\VideoTracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class VideoTrackingController extends MyController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('is_educational', 'is_testimonial', 'is_business');

        $where = ['user_id' => $data['user_id'], 'video_id' => $data['video_id']];
        $user_id = $data['user_id'];

        $video = Video::firstWhere('id', $data['video_id']);

        if (Session::has('admin_id'))
            $actor_id = Session::get('admin_id');
        else
            $actor_id = $data['user_id'];

        $track = VideoTracking::where($where)->first();
        if ($track) {
            $track->fill($data);
            $track->save();
        } else {
            VideoTracking::create($data);
            $this->sendVideoPush($user_id, $data['video_id']);
        }

        if (!empty($track->id)) {
            $this->addActivity($user_id, $actor_id, "video-watched", '', "landing", "VideoTracking", $track->id);
        }

        $video_limit = StaticDatabase::getSettings()->firstWhere('key', 'video_limit')->value;

        $tracking = VideoTracking::whereHas('video', function ($q) use ($video) {
            $q->where('is_testimonial', $video->is_testimonial);
            $q->where('is_educational', $video->is_educational);
            $q->where('is_business', $video->is_business);
        })
            ->where([['watched', '>=', $video_limit], ['user_id', $user_id]])
            ->with('video')
            ->get();

        if ($tracking->count() > 0) {
            if ($video->is_educational) {
                if ($tracking->count() >= 2) {
                    $funnel_step = FunnelStep::where('key', 'educational-videos')->first();
                    $this->addActivity($user_id, $actor_id, "funnel-step-completed", '', "landing", "FunnelStep", $funnel_step->id);
                }
            } else if ($video->is_testimonial) {
                $funnel_step = FunnelStep::where('key', 'testimonial-videos')->first();
                $this->addActivity($user_id, $actor_id, "funnel-step-completed", '', "landing", "FunnelStep", $funnel_step->id);
            }
        }

        $this->checkFunnelSteps($user_id, $actor_id);

        return response()->json("success");
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

    private function sendVideoPush($user_id, $video_id)
    {
        $user = User::where('id', $user_id)->first();
        $video = Video::where('id', $video_id)->first();
        $notification_data = ['CONTACT' => $user->name, 'VIDEO_TITLE' => $video->title];
        $notification_type = $video->is_testimonial == 1 ? 'testimonial-video-started' : 'video';

        $this->sendPush($user, $notification_data, $notification_type);
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

        foreach ($users_to_send as $user_id) {
            NotificationHelper::sendPush($user_id, $user->id, $notification_type, $notification_data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
