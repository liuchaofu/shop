<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{

    public function shopcates()
    {
        return $this->belongsTo(ShopCategory::class,"shop_category_id");

    }
    //可修改的字段
    protected $fillable=["shop_category_id","shop_name","shop_img","shop_rating","brand","on_time","fengniao","bao","piao","zhun","start_send","start_cost","notice","discount","status"];
}
