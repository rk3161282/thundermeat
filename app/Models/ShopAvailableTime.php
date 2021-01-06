<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopAvailableTime extends Model 
{

    protected $table = 'shopAvailableTime';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}