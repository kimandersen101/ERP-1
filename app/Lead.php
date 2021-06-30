<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    public $timestamps = false;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];


    /**
     * Get the 'user' that owns the 'lead' record.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($Lead) {
            if(empty($Lead->uid))
            {
                $Lead->uid = Uid::create()->uid;
            }

            $Role = Role::where('key', 'lead')->first();
            $User = User::where('id', $Lead->user_id)->first();
            $User->roles()->attach($Role->id);
        });
    }
}
