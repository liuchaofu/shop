@extends("admin.layouts.main")
@section("title","后端首页")

@section("content")
   <a href="{{route("admin.ac.add")}}" class="btn btn-info">添加</a>

   <table class="table">
      <tr>
         <th>Id</th>
         <th>名字</th>
         <th>图片</th>
         <th>状态</th>
         <th>操作</th>
      </tr>
      @foreach($shops as $shop)
         <tr>
            <td>{{$shop->id}}</td>
            <td>{{$shop->name}}</td>
            <td>
               <img src="/{{$shop->img}}" width="100">
            </td>
            <td>{{$shop->status}}</td>

            <td>
               <a href="{{route("admin.ac.edit",$shop->id)}}" class="btn btn-success">编辑</a>
               <a href="{{route("admin.ac.del",$shop->id)}}" class="btn btn-info">删除</a>
            </td>
         </tr>
      @endforeach
   </table>

@endsection

@extends("admin.layouts._footer")