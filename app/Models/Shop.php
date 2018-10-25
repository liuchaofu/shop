<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
//    分类
    public function shopcates()
    {
        return $this->belongsTo(ShopCategory::class,"shop_category_id");

    }

    //属于谁
    public function user(){
        return $this->belongsTo(User::class,"user_id");
    }
    //可修改的字段
    protected $fillable=["shop_category_id","user_id","shop_name","shop_img","shop_rating","brand","on_time","fengniao","bao","piao","zhun","start_send","start_cost","notice","discount","status"];
}
