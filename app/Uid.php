<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Uid extends Model
{
    protected $primaryKey = 'uid';
    public $timestamps = false;
    protected $fillable = ['uid'];
    public $incrementing = false;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    protected static function booted()
    {
        static::creating(function ($Uid) {
            do {
                $Uid->uid = Str::random(11);
            } while (
                Lead::where('uid', $Uid->uid)->exists() ||
                Agent::where('username', $Uid->uid)->exists() ||
                Uid::where('uid', $Uid->uid)->exists()
            );
        });
    }
}
