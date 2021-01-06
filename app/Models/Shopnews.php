<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shopnews extends Model 
{

    protected $table = 'shopnews';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}