@extends("admin.layouts.main")
@section("title","个人信息修改")

@section("content")

    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label class="col-sm-2 control-label">名字</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="name" name="name" value="{{$admins->name}}" disabled >
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">确认密码</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password" value="{{old("password")}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">新密码</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password_confirmation" value="{{old("password")}}">
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">修改</button>
            </div>
        </div>
    </form>


@endsection

@extends("admin.layouts._footer")