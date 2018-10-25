<?php

namespace App\Http\Controllers\Admin;

use App\Models\ShopCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopCategoryController extends Controller
{
    //显示
    public function index()
    {
        $shops = ShopCategory::all();
        return view("admin.ac.index",compact("shops"));

    }
    //增
    public function add(Request $request)
    {
        //判断是不是post
        if($request->isMethod("post")){
            $data = $this->validate($request,[
                "name"=>"required",
                "img"=>"required|image",

            ]);
            $data = $request->post();

            //把图片添加到数据库
            $data['img']=$request->file("img")->store("images","img");
//            dd($data);
            if(ShopCategory::create($data)){
                return redirect()->route("admin.ac.index")->with("success", "添加成功");
            }

        }
        return view("admin.ac.add");

    }
    //改
    public function edit(Request $request,$id)
    {
        //找到一个
        $shop = ShopCategory::find($id);
        $tu = $shop['img'];
//        dd($tu);
        //判断是不是post
        if($request->isMethod("post")){
            $data=$request->post();
            //删除之前的图片
            @unlink($tu);
            //添加修改的图片到数据库
            $data['img']=$request->file("img")->store("images","img");

            if($shop->update($data)){
                return redirect()->route("admin.ac.index")->with("success", "修改成功");
            }

        }

        return view("admin.ac.edit",compact("shop"));

    }
    //删
    public function del($id)
    {
        //找到一个
        $shops = ShopCategory::find($id);
        $re=$shops["img"];
        //关于文件夹的问题，就是删除了数据库里面的图片，但是文件夹里面还有

        if($shops->delete()){
            @unlink($re);
            return redirect()->route("admin.index")->with("success", "删除成功");
        }

    }
}
