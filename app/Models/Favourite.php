<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favourite extends Model 
{

    protected $table = 'favourites';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}