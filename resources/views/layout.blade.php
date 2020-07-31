<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
    @yield('styles')
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a href="/tasks" class="navbar-brand">ToDo List</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar7">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse justify-content-stretch" id="navbar7">
                <ul class="navbar-nav ml-auto">
                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link">{{ Auth::user()->name }} さんログイン中</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="logout" style="cursor:pointer">ログアウト</a>
                        <form id="logout-form" method="post" action="{{ route('logout') }}">
                            @csrf
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">会員登録</a>
                    </li>
                @endif
                </ul>
            </div>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    @if(Auth::check())
        <script>
            document.getElementById('logout').addEventListener('click', function(event){
                event.preventDefault();
                document.getElementById('logout-form').submit();
            });
        </script>
    @endif
    @yield('scripts')
</body>
</html>
