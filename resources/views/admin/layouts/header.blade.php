<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">商家账户</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{route("admin.ac.index")}}">商家分类 <span class="sr-only">(current)</span></a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">商家 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route("admin.user.index")}}">商家账号</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="">商家信息</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{route("admin.ac.insert")}}">商家账号和商家信息</a></li>
                    </ul>
                </li>
            </ul>



            <ul class="nav navbar-nav navbar-right">

                @auth("admin")
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
{{\Illuminate\Support\Facades\Auth::guard("admin")->user()->name}}
                            {{--{{\Illuminate\Support\Facades\Auth::user()->name}}--}}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">编辑</a></li>

                            <li role="separator" class="divider"></li>
                            <li><a href="">注销</a></li>
                        </ul>
                    </li>
                @endauth

                @guest("admin")
                    <li><a href="">登录</a></li>
                    <li><a href="">注册</a></li>
                @endguest

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>