@extends("shop.layouts.main")
@section("title","注册")

@section("content")

    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label class="col-sm-2 control-label">名字</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="name" name="name">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">再次输入密码</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" placeholder="Password" name="password_confirmation">
            </div>
        </div>

        {{--<div class="form-group">--}}
            {{--<label for="inputPassword3" class="col-sm-2 control-label">选择头像</label>--}}
            {{--<div class="col-sm-10">--}}
                {{--<input type="file" name="img">--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
            {{--<label class="col-sm-2 control-label">验证码</label>--}}
            {{--<div class="col-sm-10">--}}
                {{--<input id="captcha" class="form-control" name="captcha" size="6">--}}
                {{--<img class="thumbnail captcha" src="{{captcha_src('flat')}}"--}}
                     {{--onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">--}}
            {{--</div>--}}
        {{--</div>--}}


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">注册</button>
            </div>
        </div>
    </form>

@endsection

@extends("shop.layouts._footer")