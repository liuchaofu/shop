@extends("admin.layouts.main")
@section("title","修改分类")

@section("content")
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label class="col-sm-2 control-label">名字</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="name" name="name" value="{{old("name",$shop->name)}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">选择图片</label>
            <div class="col-sm-10">
                <input type="file" name="img">
                <img src="/{{$shop->img}}" alt="" width="100">
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
                <button type="submit" class="btn btn-default">修改</button>
            </div>
        </div>
    </form>

@endsection

@extends("admin.layouts._footer")