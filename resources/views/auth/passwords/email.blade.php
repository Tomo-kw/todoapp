@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="cal col-md-8">
            <div class="card card-default">
                <div class="card-header">パスワード変更</div>
                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif                       
                    <div class="alert"> 
                        <form action="{{ route('password.email') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>登録済みのメールアドレスを入力し送信してください。</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">送信</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="text-center pass-change">
                <p>テスト送信のみ実装のため現在変更はできません</P>
            </div>
        </div>
    </div>
</div>
@endsection