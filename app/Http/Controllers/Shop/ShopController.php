<?php

namespace App\Http\Controllers\Shop;

use App\Models\Shop;
use App\Models\ShopCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends BaseController
{
    //显示添加视图
    public function index(Request $request)
    {
        $fl = ShopCategory::all();

        //post
        if($request->isMethod("post")){
            $this->validate($request,[
                "shop_category_id"=>"required",
                "shop_name"=>"required",
                "shop_img"=>"required",
                "start_send"=>"required",
                "start_cost"=>"required",
                "notice"=>"required",
                "discount"=>"required",

            ]);
            $data = $request->post();

            //添加修改的图片到数据库
            $data['shop_img']=$request->file("shop_img")->store("images","img");

            $data['brand'] = $request->has("brand")?1:0;
            $data['on_time'] = $request->has("on_time")?1:0;
            $data['fengniao'] = $request->has("fengniao")?1:0;
            $data['piao'] = $request->has("piao")?1:0;
            $data['zhun'] = $request->has("zhun")?1:0;
            $data['bao'] = $request->has("bao")?1:0;
//            dd($data);
//            send_cost
            if(Shop::create($data)){
                return redirect()->intended(route("shop.user.index"))->with("info","请耐心等待审核");
            }

        }
        return view("shop.sp.index",compact("fl"));

    }


}
