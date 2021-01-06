<?php

// namespace App;
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeneralSettings extends Model 
{

    protected $table = 'general_settings';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}