<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//shop
Route::domain("shop.store.com")->namespace("Shop")->group(function (){
//    注册
    Route::any("user/reg","UserController@reg")->name("shop.user.reg");

//   登录
    Route::any("user/login","UserController@login")->name("shop.user.login");
//   退出
    Route::any("user/logout","UserController@logout")->name("shop.user.logout");
//    修改个人密码
    Route::any("user/info","UserController@info")->name("shop.user.info");
//   首页
//    Route::any("user/index","UserController@index")->name("shop.user.index");
    Route::any("sp/index","ShopController@index")->name("shop.sp.index");
//    添加商铺
    Route::any("sp/add","ShopController@add")->name("shop.sp.add");
//    等待页面
    Route::any("sp/wait","ShopController@wait")->name("shop.sp.wait");

});

//admin
Route::domain("admin.store.com")->namespace("Admin")->group(function (){
    //登录
    Route::any("ad/login","AdminController@login")->name("admin.ad.login");
    //注销
    Route::any("ad/logout","AdminController@logout")->name("admin.ad.logout");
    //显示页面需要审核的东西
    Route::any("ad/index","AdminController@index")->name("admin.ad.index");
    //审核 需要判断如果状态时没审核就显示，审核过隐藏
    Route::any("ad/check/{id}","AdminController@check")->name("admin.ad.check");
    //修改个人信息
    Route::any("ad/info","AdminController@info")->name("admin.ad.info");

    //商家信息的curl
    Route::any("ad/add","AdminController@add")->name("admin.ad.add");
    Route::any("ad/edit/{id}","AdminController@edit")->name("admin.ad.edit");
    Route::any("ad/del/{id}","AdminController@del")->name("admin.ad.del");


    //商家账户和商家信息可以一起添加
    Route::any("ac/insert","AdminController@insert")->name("admin.ac.insert");

    //商家分类的curl
    Route::any("ac/index","ShopCategoryController@index")->name("admin.ac.index");
    Route::any("ac/add","ShopCategoryController@add")->name("admin.ac.add");
    Route::any("ac/edit/{id}","ShopCategoryController@edit")->name("admin.ac.edit");
    Route::any("ac/del/{id}","ShopCategoryController@del")->name("admin.ac.del");

    //商家账户的curl
    Route::any("user/index","UserController@index")->name("admin.user.index");
    Route::any("user/add","UserController@add")->name("admin.user.add");
    Route::any("user/edit/{id}","UserController@edit")->name("admin.user.edit");
    Route::any("user/del/{id}","UserController@del")->name("admin.user.del");

});






