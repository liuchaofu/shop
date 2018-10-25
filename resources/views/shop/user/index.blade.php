@extends("shop.layouts.main")
@section("title","商铺首页")

@section("content")
    <a href="{{route("shop.sp.index")}}" class="btn btn-info">添加店铺信息</a>

@endsection

@extends("shop.layouts._footer")