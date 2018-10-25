<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopCategory extends Model
{
    //分类下的东西 为了状态
//    public function shops(){
//        return $this->hasMany(Shop::class,"shop_category_id");
//    }
    //可修改的字段
    protected $fillable=["name","img","status"];
}
