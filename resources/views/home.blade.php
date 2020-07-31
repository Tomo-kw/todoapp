@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" style="background-color:white">やることを一つ作成してみましょう！</div>
                <a href="{{ route('tasks.create') }}" class="btn btn-home btn-primary">やること作成</a>
            </div>
        </div>
    </div>
</div>
@endsection
