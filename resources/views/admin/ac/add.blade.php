@extends("admin.layouts.main")
@section("title","添加分类")

@section("content")
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label class="col-sm-2 control-label">名字</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="name" name="name" value="{{old("name")}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">选择图片</label>
            <div class="col-sm-10">
                <input type="file" name="img">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">状态</label>
            <div class="col-sm-10">
                <input type="radio" name="status" value="1" checked >上线
                <input type="radio" name="status" value="0">不上线
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