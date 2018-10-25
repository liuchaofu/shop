@extends("admin.layouts.main")
@section("title","后端首页")

@section("content")

   <table class="table">
      <tr>
         <th>Id</th>
         <th>店铺分类</th>
         <th>名称</th>
         <th>店铺图片</th>
         <th>评分</th>
         <th>起送金额</th>
         <th>配送费</th>
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
            <td>
               <img src="/{{$shop->shop_img}}" width="100">
            </td>
            <td>{{$shop->shop_rating}}</td>
            <td>{{$shop->start_send}}</td>
            <td>{{$shop->start_cost}}</td>
            <td>{{$shop->notice}}</td>
            <td>{{$shop->discount}}</td>
            <td>
                <?php if($shop->status==0) echo '待审核'; if($shop->status==1) echo '正常';if($shop->status==-1) echo '禁用'; ?>
               {{--{{$shop->status}}--}}
            </td>

            <td>
               <a href="{{route("admin.ad.check",$shop->id)}}" class="btn btn-info">审核</a>
               {{--<a href="{{route("shop.edit",$shop->id)}}" class="btn btn-success">编辑</a>--}}
               {{--<a href="{{route("shop.del",$shop->id)}}" class="btn btn-info">删除</a>--}}
            </td>
         </tr>
      @endforeach
   </table>

@endsection

@extends("admin.layouts._footer")