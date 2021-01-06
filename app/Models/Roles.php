<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Roles extends Model 
{

    protected $table = 'roles';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function roles()
    {
        return $this->hasMany('Users');
    }

    public function permissions()
    {
        return $this->hasMany('Permissions');
    }

}