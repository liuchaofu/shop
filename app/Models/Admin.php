<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    //找类的名字


    //可修改的字段
    protected $fillable=["name","email","password"];
}
