@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="cal col-md-8">
            <div class="card card-default">
                <div class="card-header">ログインページ</div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $message)
                                <p>{{ $message }}</p>
                            @endforeach
                        </div>
                    @endif                       
                    <div class="alert"> 
                        <form method="post" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">メールアドレス</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
                            </div>
                            <div class="form-group">
                                <label for="password">パスワード</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">ログイン</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="text-center pass-change">
                <a href="{{ route('password.request') }}">パスワード変更</a>
            </div>
        </div>
    </div>
</div>

@endsection