<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banners extends Model 
{

    protected $table = 'banners';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}