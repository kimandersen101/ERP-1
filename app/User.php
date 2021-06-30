<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    protected $guarded = [];

    protected $appends = ['name'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'is_test' => 'boolean',
        'is_loyalty_member' => 'boolean',
    ];

    public function getNameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    /**
     * The 'roles' that belong to the 'user'.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Get the 'lead' record associated with the user.
     */
    public function lead()
    {
        return $this->hasOne(Lead::class);
    }

    /**
     * Get the 'agent' record associated with the user.
     */
    public function agent()
    {
        return $this->hasOne(Agent::class);
    }

    /**
     * Get the 'account' record associated with the user.
     */
    public function account()
    {
        return $this->hasOne(Account::class);
    }

    /**
     * Get the child 'users' for a parent 'user'.
     */
    public function children()
    {
        return $this->hasMany(User::class, 'parent_id', 'id');
    }

    public function parent_user()
    {
        return $this->belongsTo(User::class, 'parent_id', 'id');
    }

    static public function validateEmail($uid, $email)
    {
        $lead = User::wherehas('lead', function ($q) use ($uid) {
            $q->where('uid', $uid);
        })->first();

        if (empty($lead->password))
            $User = User::where('email', $email)->where('id', '!=', $lead->id)->first();
        else
            $User = User::where('email', $email)->first();

        return [
            'status' => $User ? 'Error' : 'Success',
            'type' => empty($lead->password) ? 'update' : 'new'
        ];
    }
}
