@extends("admin.layouts.main")
@section("title","后端用户管理")

@section("content")
   <a href="{{route("admin.user.add")}}" class="btn btn-info">添加</a>

   <table class="table">
      <tr>
         <th>Id</th>
         <th>名字</th>
      </tr>
      @foreach($users as $user)
         <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>
               <a href="{{route("admin.user.edit",$user->id)}}" class="btn btn-success">编辑</a>
               <a href="{{route("admin.user.del",$user->id)}}" class="btn btn-info">删除</a>
            </td>
         </tr>
      @endforeach
   </table>

@endsection

@extends("admin.layouts._footer")