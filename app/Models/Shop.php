<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model 
{

    protected $table = 'shops';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function meats()
    {
        return $this->hasMany('Meat');
    }

    public function requests()
    {
        return $this->hasMany('Requests');
    }

    public function coupons()
    {
        return $this->hasMany('CoupenLists');
    }

    public function categories()
    {
        return $this->hasMany('Category');
    }

    public function avaliablity()
    {
        return $this->hasMany('ShopAvailableTime');
    }

    public function news()
    {
        return $this->hasMany('Shopnews');
    }

    public function notification()
    {
        return $this->hasMany('Notifications');
    }

    public function banners()
    {
        return $this->hasMany('Banners');
    }

    public function reviews()
    {
        return $this->hasMany('Reviews');
    }

}