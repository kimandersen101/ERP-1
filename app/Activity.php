<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
    ];

    static function isReadyToBuy( $user_id = NULL )
    {
        if( $user_id && $readyToBuy = self::getStateByKey( $user_id, 'ready-to-buy' ) )
            return $readyToBuy->value ? TRUE : FALSE;

        return NULL;
    }

    static function isOpportunityShared( $user_id = NULL )
    {
        if( $user_id )
            return self::getStateByKey( $user_id, 'business-opportunity' ) ? TRUE : FALSE;

        return NULL;
    }

    static function getStateByKey( $user_id, $key )
    {
        return self::select('value', 'location')
            ->where('user_id', $user_id)
            ->where('key', $key)
            ->orderBy('created_at')
            ->limit(1)
            ->get()
            ->first();
    }

    static function addActivity($user_id, $actor_id, $agent_id, $key, $value, $location, $object, $object_id)
    {
        $activity = compact('user_id', 'actor_id', 'agent_id', 'key', 'value', 'location', 'object', 'object_id');

        Activity::create($activity);
    }
}
