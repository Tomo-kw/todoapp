@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">会員登録</div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $message)
                                <p>{{ $message }}</p>
                            @endforeach
                        </div>
                    @endif
                    <div class="alert">
                        <form method="post" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name ">名前もしくはニックネーム</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="email">メールアドレス</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="password">パスワード</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">パスワード（確認用）</label>
                                <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">登録</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection