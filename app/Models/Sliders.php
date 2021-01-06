<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sliders extends Model 
{

    protected $table = 'sliders';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}