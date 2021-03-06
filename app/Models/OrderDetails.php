<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetails extends Model 
{

    protected $table = 'order_details';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}