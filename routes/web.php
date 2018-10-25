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
//   首页
    Route::any("user/index","UserController@index")->name("shop.user.index");
//    添加商铺
    Route::any("sp/index","ShopController@index")->name("shop.sp.index");

});

//admin
Route::domain("admin.store.com")->namespace("Admin")->group(function (){
    //登录
    Route::any("ad/login","AdminController@login")->name("admin.ad.login");
    //显示页面需要审核的东西
    Route::any("ad/index","AdminController@index")->name("admin.ad.index");
    //审核
    Route::any("ad/check/{id}","AdminController@check")->name("admin.ad.check");

    //商家分类

    Route::any("ac/index","ShopCategoryController@index")->name("admin.ac.index");
    Route::any("ac/add","ShopCategoryController@add")->name("admin.ac.add");
    Route::any("ac/edit/{id}","ShopCategoryController@edit")->name("admin.ac.edit");
    Route::any("ac/del/{id}","ShopCategoryController@del")->name("admin.ac.del");

    //商家账户和商家信息可以一起添加
    Route::any("ac/insert","AdminController@insert")->name("admin.ac.insert");
    //商家账户的curl
    Route::any("user/index","UserController@index")->name("admin.user.index");
    Route::any("user/add","UserController@add")->name("admin.user.add");
    Route::any("user/edit/{id}","UserController@edit")->name("admin.user.edit");
    Route::any("user/del/{id}","UserController@del")->name("admin.user.del");

});






