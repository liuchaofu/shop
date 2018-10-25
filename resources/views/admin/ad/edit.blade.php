@extends("admin.layouts.main")
@section("title","修改分类")

@section("content")
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">分类</label>
            <div class="col-sm-10">
                <select name="shop_category_id" class="form-control">
                    <option >--选择分类--</option>
                    @foreach($fl as $fls)
                        <option value="{{$fls->id}}" <?php if($shops->shop_category_id==$fls->id) echo "selected";?>>{{$fls->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  placeholder="名称" name="shop_name" value="{{old("shop_name",$shops->shop_name)}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">店铺图片
            </label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name="shop_img">
                <img src="/{{$shops->shop_img}}" alt="" width="100">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">起送金额
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="起送金额" name="start_send" value="{{old("start_send",$shops->start_send)}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">配送费
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="配送费" name="start_cost" value="{{old("start_cost",$shops->start_cost)}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">店公告
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="店公告" name="notice" value="{{old("notice",$shops->notice)}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">优惠信息
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="优惠信息" name="discount"  value="{{old("discount",$shops->discount)}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">
            </label>
            <div class="col-sm-10">
                <input type="checkbox"  name="brand" >品牌连锁店&nbsp;
                <input type="checkbox"  name="on_time"  >准时送达&nbsp;
                <input type="checkbox"  name="fengniao"  >蜂鸟配送&nbsp;
                <input type="checkbox"  name="bao"   >保&nbsp;
                <input type="checkbox"  name="piao"  >票&nbsp;
                <input type="checkbox"  name="zhun"  >准
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