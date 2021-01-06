<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankDetails extends Model 
{

    protected $table = 'bankDetails';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}