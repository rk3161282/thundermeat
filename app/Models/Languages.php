<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Languages extends Model 
{

    protected $table = 'languages';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}