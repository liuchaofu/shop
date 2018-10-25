<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopCategory extends Model
{
    //可修改的字段
    protected $fillable=["name","img","status"];
}
