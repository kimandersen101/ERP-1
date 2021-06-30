<?php

namespace App;

use App\Services\PushNotification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class UserNote extends Model
{
    use SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    protected $appends = ['date'];

    public function getDateAttribute()
    {
        return Carbon::parse($this->created_at)->setTimezone(Auth::user()->timezone)->format('m.d.Y @h:iA');
    }

    /**
     * Get the 'user' that owns the 'subscription' record.
     */
    public function actor_user()
    {
        return $this->belongsTo(User::class, 'actor_id', 'id');
    }


    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::created(function ($UserNote) {
            Activity::create([
                'user_id' => $UserNote->user_id,
                'agent_id' => $UserNote->actor_id,
                'actor_id' => $UserNote->actor_id,
                'key' => Str::lower($UserNote->type) . '-notes',
                'location' => 'app-user-detail',
                'object' => 'UserNote',
                'object_id' => $UserNote->id
            ]);

            // send push notification
            if($UserNote->type == 'PERSONAL')
            {
                $User = User::find($UserNote->user_id);

                $pushNotification = resolve(PushNotification::class);

                $receiver_ids = LeadHandoff::where(['lead_id' => $User->id])->pluck('support_id')->toArray();
                $receiver_ids[] = $User->parent_id;

                $notification_data = ['USER' => User::find($UserNote->actor_id)->name];

                foreach($receiver_ids as $receiver_id)
                {
                    if($receiver_id != Auth::id())
                        $pushNotification->notifyUser($receiver_id, $User->id, 'APP', 'personal-notes', $notification_data);
                }
            }
        });
    }
}
