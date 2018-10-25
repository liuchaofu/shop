<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //显示
    public function index()
    {
        $users = User::all();
        return view("admin.user.index",compact("users"));
    }
    //增加
    public function add(Request $request)
    {
        //判断是不是post
        if($request->isMethod("post")){
            $data = $this->validate($request,[
                "name"=>"required",
                "password"=>"required",

            ]);
            $data = $request->post();
            //为密码加密
            $data['password'] = bcrypt($data['password']);

            if(User::create($data)){
                return redirect()->route("admin.user.index")->with("success", "添加成功");
            }

        }
        return view("admin.user.add");

    }
    //修改
    public function edit(Request $request,$id)
    {
        //找到一个
        $users = User::find($id);
//        dd($users);
        //判断是不是post
        if($request->isMethod("post")){
            $data=$request->post();
            $data['password'] = bcrypt($data['password']);

            if($users->update($data)){
                return redirect()->route("admin.user.index")->with("success", "修改成功");
            }

        }
        return view("admin.user.edit",compact("users"));


    }

    //删除
    public function del($id)
    {

        //找到一个
        $users = User::find($id);
        //判断在shop里面有没有它的店铺，有就不能删除
//        $check = DB::select('select * from shops where user_id = ?', ["$id"]);
//
//        if($check){
//            return redirect()->route("admin.user.index")->with("info", "该用户下面还有店铺，不能删除");
//        }else{
//            $users->delete();
//
//
//        }
        //事务
        DB::transaction(function () use($id){
            DB::table('users')->where('id','=',$id)->delete();

            DB::table('shops')->where('user_id','=',$id)->delete();
        });

        return redirect()->route("admin.user.index")->with("success", "删除成功");
    }
}
