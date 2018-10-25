<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    //设置权限
    public function __construct()
    {
        $this->middleware("auth",[
            "except"=>["login","reg"]
        ]);

    }

}
