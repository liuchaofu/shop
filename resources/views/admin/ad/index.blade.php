@extends("admin.layouts.main")
@section("title","后端首页")

@section("content")

    <div class="container-fluid">
        <table class="table">
            <tr>
                <th>Id</th>
                <th>店铺分类</th>
                <th>名称</th>
                <th>用户</th>
                <th>店铺图片</th>
                <th>店公告</th>
                <th>优惠信息</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            @foreach($shops as $shop)
                <tr>
                    <td>{{$shop->id}}</td>
                    <td>{{$shop->shopcates->name}}</td>
                    <td>{{$shop->shop_name}}</td>
                    <td>{{$shop->user->name}}</td>
                    <td>
                        <img src="/{{$shop->shop_img}}" width="100">
                    </td>
                    <td>{{$shop->notice}}</td>
                    <td>{{$shop->discount}}</td>
                    <td>
                        <?php if($shop->status==0) echo '待审核'; if($shop->status==1) echo '正常';if($shop->status==-1) echo '禁用'; ?>
                    </td>


                    <td>

                        @if($shop->status==0 || $shop->status==-1 )
                            <a href="{{route('admin.ad.check',$shop->id)}}" class="btn btn-danger">审核</a>
                        @else
                            <a href="" ></a>
                        @endif

                        <a href="{{route("admin.ad.edit",$shop->id)}}" class="btn btn-success">编辑</a>
                        <a href="{{route("admin.ad.del",$shop->id)}}" class="btn btn-info">删除</a>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>

@endsection

@extends("admin.layouts._footer")