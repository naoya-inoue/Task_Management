<header>
    <nav class="navbar navbar-inverse">
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
                    @if (Auth::check())
                                <li>{!! link_to_route('users.index', 'Me', ['id' => Auth::id()]) !!}</li>
                                <li>{!! link_to_route('users.groups.list', '参加グループ一覧', ['id' => Auth::id()]) !!}</li>
                                <li>{!! link_to_route('users.tasks.list', '個人タスク一覧', ['id' => Auth::id()]) !!}</li>
                                <li>{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                            </ul>
                    @else
                        <li>{!! link_to_route('signup.get', 'サインアップ') !!}</li>
                        <li>{!! link_to_route('login', 'ログイン') !!}</li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>