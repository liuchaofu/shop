<?php

namespace App\Http\Controllers\Shop;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends BaseController
{
    //注册
    public function reg(Request $request)
    {
        //判断是不是post
        if ($request->isMethod("post")) {
            //健壮性
            $this->validate($request, [
                "name" => "required",
                "password" => "required|confirmed"
            ]);
            $data = $request->post();
            //为密码加密
            $data['password'] = bcrypt($data['password']);

            if (User::create($data)) {
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
        if ($request->isMethod("post")) {
            //健壮性
            $data = $this->validate($request, [
                "name" => "required",
                "password" => "required",
            ]);

            if (Auth::attempt($data, $request->has("remember"))) {
                //判断有无店铺没有直接跳添加，有就显示首页
                $userId = Auth::user()->id;

//                $ok = DB::table('shops')->where('name', 'John')->value('email');
                //判断有没有商铺
                $ok = DB::select('select * from shops where user_id = ?', ["$userId"]);

                //有成功 进入后端
                if ($ok) {
                    //在判断商铺状态是不是被禁用
                    $mm = DB::select('select status from shops where user_id = ?', ["$userId"]);
//                    dd($mm[0]->status);
                    //判断状态店铺洋浦没有被禁用
                    if ($mm[0]->status == "1") {
                        //登录成功
                        return redirect()->intended(route("shop.user.index"))->with("success", "登录成功");
                    }elseif($mm[0]->status == "0"){
                        //正在审核
                        return "wait";
                    }else{
                        //被禁用
                        return "over";
                    }

                } else {

                    return redirect()->route("shop.sp.index");
                }


            } else {
                //登录失败
                return redirect()->back()->withInput()->with("danger", "账号或密码错误");
            }

        }

        return view("shop.user.login");

    }
    //退出
    public function logout()
    {
        //注销
        Auth::guard()->logout();
        return redirect()->route("shop.user.login");
        
    }
    
    
    
    //显示
    public function index()
    {
        return view("shop.user.index");
    }
    //修改密码
    public function info(Request $request)
    {
        $id = Auth::id();
        $users = User::find($id);
//        dd($users);
        if($request->isMethod("post")){
            $this->validate($request,[
                "password"=>"required|confirmed"
            ]);
            $data = $request->post();
            $data['password']=bcrypt($data['password']);
            if($users->update($data)){
//                dd($request->post());
                return redirect()->route("shop.user.index")->with("info","个人信息修改成功");
            }
        }
        return  view("shop.user.info",compact("users"));

    }


    //注册那个店铺
    public function add()
    {
//        $id = Auth::id();
//        dd($id);
        return view("shop.sp.index");
    }
}
