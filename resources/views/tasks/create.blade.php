@extends('layout')

@section('styles')
    @include('share.flatpickr.styles')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-md-8">
                <div class="card card-default">
                    <div class="card-header">下記を入力して「追加」ボタンをクリック</div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class=" alert alert-danger">
                                @foreach($errors->all() as $message)
                                    <p>{{ $message }}</p>
                                @endforeach
                            </div>
                        @endif
                        <div class="alert">
                            <form action="{{ route('tasks.create') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="content">やること</label><br>
                                    <input type="text" class="form-control" name="content" id="content" value="{{ old('content') }}" />
                                </div>
                                <div class="form-group">
                                    <label for="due_date">期限</label>
                                    <input type="text" class="form-control" name="due_date" id="due_date" value="{{ old('due_date') }}" />
                                </div>
                                <div class="form-group">
                                    <label for="status">優先度</label>
                                    <select class="form-control" name="status" id="status" value="{{ old('status') }}">
                                        @foreach(\App\Task::STATUS as $key => $val)
                                            <option value="{{ $key }}">{{ $val['priority'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">追加</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('share.flatpickr.scripts')
@endsection