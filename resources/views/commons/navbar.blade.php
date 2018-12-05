<header>
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Task Management</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>{!! link_to_route('signup.get', 'サインアップ') !!}</li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">User<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Userページ</a></li>
                            <li><a href="#">参加グループ</a></li>
                            <li><a href="#">タスク一覧</a></li>
                        </ul>
                    </li>

                    <li><a href="#">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>