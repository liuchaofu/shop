@extends("shop.layouts.main")
@section("title","商铺首页")

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

        </tr>

            <tr>
                <td>{{$shops->id}}</td>
                <td>{{$shops->shopcate->name}}</td>
                <td>{{$shops->shop_name}}</td>
                <td>{{$shops->users->name}}</td>
                <td>
                    <img src="/{{$shops->shop_img}}" width="100">
                </td>
                <td>{{$shops->notice}}</td>
                <td>{{$shops->discount}}</td>
                <td>
                    <?php if($shops->status==0) echo '待审核'; if($shops->status==1) echo '正常';if($shops->status==-1) echo '禁用'; ?>
                </td>

            </tr>

    </table>

    </div>

@endsection

@extends("shop.layouts._footer")