<?php


namespace App\Http\View\Composers;


use App\Lead;
use App\Page;
use App\Services\CookieHandler;
use Illuminate\View\View;

class PageComposer
{
    public function compose(View $view)
    {
        $uid = CookieHandler::getUID();
        $page_slug = request()->segment(1);
        $sub_page_slug = request()->segment(2);

        if($page_slug == 'co-applicant')
            $sub_page_slug = null;
        if($page_slug == '' || request()->route()->getName() == 'optin')
            $page_slug = 'home';

        $lead = Lead::where('uid', $uid)->first();
        if ($page_slug && $sub_page_slug) {
            $page = Page::where('slug', '=', $sub_page_slug)->first();
        } else {
            $page = Page::where('slug', '=', $page_slug)->first();
        }

        if ($page) {
            $page_tracking = Page::with(['tracking' => function ($q) use ($lead) {
                    $q->where('user_id', $lead->user_id);
                }])
                ->where('slug', '=', $page->slug)
                ->first();

            $view->with('page_detail', $page_tracking);
        } else {
            $view->with('page_detail', $page);
        }
    }
}
