<?php

namespace App\Http\Controllers\Admin;

use App\Models\Shop;
use App\Models\ShopCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends BaseController
{
    //登录
    public function login(Request $request)
    {
        //判断是不是post
        if($request->isMethod("post")){
            //健壮性
            $data = $this->validate($request,[
                "name"=>"required",
                "password"=>"required",
//                "email"=>"required"
            ]);

            if (Auth::guard("admin")->attempt($data,$request->has("remember"))){

                //登录成功
//                return "ok";
                return redirect()->intended(route("admin.ad.index"))->with("success","登录成功");
            }else{
                //登录失败
                //session()->flash("danger","账号或密码错误");
                return redirect()->back()->withInput()->with("danger","账号或密码错误");
            }

        }

        return view("admin.ad.login");

    }
    //商家分类商家账户
    public function insert()
    {

        $fl = ShopCategory::all();


        return view("admin.ac.insert",compact("fl"));

    }

    //显示
    public function index()
    {
        //显示需要审核的商户
        $shops = Shop::all();
//        dd($shops);
        return view("admin.ad.index",compact("shops"));

    }
    //审核
    public function check($id)
    {
//        dd($id);
//        修改为审核过了
        DB::update('update shops set status="1" where id = ?', ["$id"]);
        return redirect()->route("admin.ad.index")->with("success", "审核成功");

    }
    //增加
    public function add()
    {

    }
    //修改
    public function edit()
    {

    }

    //删除
    public function del()
    {

    }
}
