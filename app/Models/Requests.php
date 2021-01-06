<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Requests extends Model 
{

    protected $table = 'requests';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}