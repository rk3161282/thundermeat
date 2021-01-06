<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAccessTokens extends Model
{
    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }
    protected $fillable = [
        'uuid',
        'access_token',
        'disabled',
        'requestor_ip_address',
        'created_at',
        'last_used_at',
    ];
}
