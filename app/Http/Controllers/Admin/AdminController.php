<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Shop;
use App\Models\ShopCategory;
use App\Models\User;
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
    //退出
    public function logout()
    {
        //注销
        Auth::guard("admin")->logout();

        return redirect()->route("admin.ad.login");

    }
    //修改个人信息
    public function info(Request $request)
    {
        $id = Auth::id();
        $admins = Admin::find($id);
//        dd($admins);
        if($request->isMethod("post")){
            $this->validate($request,[
                "password"=>"required|confirmed"
            ]);
            $data = $request->post();
            $data['password']=bcrypt($data['password']);
            if($admins->update($data)){
//                dd($request->post());
                return redirect()->route("admin.ad.index")->with("info","个人信息修改成功");
            }
        }
        return  view("admin.ad.info",compact("admins"));

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
//        修改为审核过了
        DB::update('update shops set status="1" where id = ?', ["$id"]);
        return redirect()->route("admin.ad.index")->with("success", "审核成功");

    }

    //增加
    public function add(Request $request)
    {
        $fl = ShopCategory::all();
        $users = User::all();
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

            $photo = $request->file("shop_img");
                //添加修改的图片到数据库
            $data['shop_img']=$photo->store("images");
            $data['brand'] = $request->has("brand")?1:0;
            $data['on_time'] = $request->has("on_time")?1:0;
            $data['fengniao'] = $request->has("fengniao")?1:0;
            $data['piao'] = $request->has("piao")?1:0;
            $data['zhun'] = $request->has("zhun")?1:0;
            $data['bao'] = $request->has("bao")?1:0;
            $data['status']=1;

//            dd($data);
//            send_cost
            if(Shop::create($data)){
                return redirect()->intended(route("admin.ad.index"))->with("info","添加店铺成功");
            }

        }
        return view("admin.ad.add",compact("fl","users"));

    }

    //修改
    public function edit(Request $request,$id)
    {
        //回显
        $shops = Shop::find($id);
//        dd($shops);images/A7INscU2e4aJEfwwKM5DE27QqpaFUX8XowKcimmT.jpeg"
        $fl = ShopCategory::all();

        //找到那个id
        $admins = Admin::find($id);

        //判断是不是post
        if($request->isMethod("post")){
            $data=$request->post();

            $photo = $request->file("shop_img");

            if($photo){
                @unlink($data['shop_img']);
                //添加修改的图片到数据库
                $data['shop_img']=$photo->store("images");
            }else{
                $data['shop_img']=$shops->shop_img;
            }


//            dd($data);

            $data['brand'] = $request->has("brand")?1:0;
            $data['on_time'] = $request->has("on_time")?1:0;
            $data['fengniao'] = $request->has("fengniao")?1:0;
            $data['piao'] = $request->has("piao")?1:0;
            $data['zhun'] = $request->has("zhun")?1:0;
            $data['bao'] = $request->has("bao")?1:0;

            if( $shops->update($data)){
                return redirect()->route("admin.ad.index")->with("success", "修改成功");
            }

        }
        return view("admin.ad.edit",compact("shops","fl"));

    }

    //删除
    public function del($id)
    {
//        dd($id);
        //找到一个
        $shops = Shop::find($id);
        $phto=$shops["shop_img"];

        if($shops->delete()){
            @unlink($phto);
            return redirect()->route("admin.ad.index")->with("success", "删除成功");
        }

    }
}
