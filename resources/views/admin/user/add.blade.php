@extends("admin.layouts.main")
@section("title","后端用户添加")

@section("content")
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label class="col-sm-2 control-label">名字</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="名字" name="name" value="{{old("name")}}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">密码</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="密码" name="password" value="{{old("name")}}">
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">添加</button>
            </div>
        </div>
    </form>

@endsection

@extends("admin.layouts._footer")