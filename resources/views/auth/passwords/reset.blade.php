@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">パスワード再設定</div>
                <div class="card-body">
                    <div class="alert">
                        <form action="{{ route('password.update') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email">メールアドレス</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">新しいパスワード</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">新しいパスワード（確認用）</label>
                                <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">送信</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection