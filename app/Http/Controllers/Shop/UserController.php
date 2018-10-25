<?php

namespace App\Http\Controllers\Shop;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    //注册
    public function reg(Request $request)
    {
        //判断是不是post
        if($request->isMethod("post")){
            //健壮性
            $this->validate($request,[
                "name"=>"required",
                "password"=>"required|confirmed"
            ]);
            $data = $request->post();
            //为密码加密
            $data['password'] = bcrypt($data['password']);

            if(User::create($data)){
//                return 111;
                 return redirect()->route("shop.user.login")->with("success", "注册成功");
            }


        }

        return view("shop.user.reg");
    }

    //登录
    public function login(Request $request)
    {
        //判断是不是post
        if($request->isMethod("post")){
            //健壮性
            $data = $this->validate($request,[
                "name"=>"required",
                "password"=>"required",
            ]);

            if (Auth::attempt($data,$request->has("remember"))){
                //登录成功
                return redirect()->intended(route("shop.user.index"))->with("success","登录成功");
            }else{
                //登录失败
                //session()->flash("danger","账号或密码错误");
                return redirect()->back()->withInput()->with("danger","账号或密码错误");
            }

        }

        return view("shop.user.login");

    }
    //显示
    public function index()
    {
        return view("shop.user.index");
    }
    //注册那个店铺
    public function add()
    {
        $id = Auth::id();
//        dd($id);
        return view("shop.sp.index");
    }
}
