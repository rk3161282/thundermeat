<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model 
{

    protected $table = 'users';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function meats()
    {
        return $this->hasMany('Users');
    }

    public function bankdetails()
    {
        return $this->hasOne('BankDetails');
    }

    public function shops()
    {
        return $this->hasMany('Shop');
    }

    public function orders()
    {
        return $this->belongsToMany('Orders');
    }

}