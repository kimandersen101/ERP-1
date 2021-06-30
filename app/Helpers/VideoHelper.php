<?php


namespace App\Helpers;


use Illuminate\Support\Facades\DB;

class VideoHelper
{
    static public function getVideo($user_id, $is_educational, $is_testimonial, $is_business, $slug = '')
    {
        $data = (object)[];

        $result = DB::table('videos AS V')
            ->leftJoin('users AS U', 'U.id', '=', DB::raw($user_id))
            ->leftJoin('video_trackings AS VT', function ($join) {
                $join->on('VT.video_id', '=', 'V.id');
                $join->on('VT.user_id', '=', 'U.id');
            })
            ->select(["V.title", "V.wistia_hash", 'U.id as user_id', 'V.slug', "V.id", DB::raw("IFNULL( VT.watched, 0 ) AS watched"), DB::raw("IFNULL( VT.played, 0 ) AS played")])
            ->where([
                ['V.is_educational', '=', DB::raw($is_educational)],
                ['V.is_testimonial', '=', DB::raw($is_testimonial)],
                ['V.is_business', '=', DB::raw($is_business)]
            ])
            ->get();

        $videos = [];
        foreach ($result as $row)
            $videos[$row->slug] = self::add_video_info($row);

        $data->videos = $videos;
        if( !empty( $videos ) )
        {
            if ($is_educational)
                $data->video = $slug != '' && array_key_exists($slug, $videos) ? $videos[$slug] : $videos['overview'];
            else if($is_testimonial)
                $data->video = $slug != '' && array_key_exists($slug, $videos) ? $videos[$slug] : $videos['dr-tracy'];
            else
                $data->video = $slug != '' && array_key_exists($slug, $videos) ? $videos[$slug] : $videos['business-opportunity'];
        }
        else{
            $data->video = (object)[];
        }
        return $data;
    }

    private static function add_video_info($video)
    {
        $duration = '';

        // video json data
        $result = json_decode(file_get_contents("http://fast.wistia.net/oembed?url=https://dallasclounch.wistia.com/medias/" . $video->wistia_hash));

        $result->duration = new \DateTime(gmdate("H:i:s", $result->duration));

        $result->duration->format('H') > 0 ? $duration .= $result->duration->format('H:') : '';
        $result->duration->format('i') > 0 ? $duration .= $result->duration->format('i:') : $duration .= '00:';
        $result->duration->format('s') > 0 ? $duration .= $result->duration->format('s') : $duration .= '00';

        $video->thumbnail = $result->thumbnail_url;
        $video->duration = $duration;

        return $video;
    }
}
