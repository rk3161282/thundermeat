<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meat extends Model 
{

    protected $table = 'meats';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}