@extends('layout')

@section('styles')
    @include('share.flatpickr.styles')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col col-md-8">
                <nav class="panel panel-default">
                    <div class="panel-heading">やることを編集し「完了」ボタンをクリック</div>
                    <div class="panel-body">
                        @if($errors->any())
                            <div class=" alert alert-danger">
                                @foreach($errors->all() as $message)
                                    <p>{{  $message }}</p>
                                @endforeach
                            </div>
                        @endif
                        <div class="alert">
                            <form action="{{ route('tasks.edit', ['id' => $task->id]) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="content">やること</label>
                                    <input type="text" class="form-control" name="content" id="content" value="{{ old('content', $task->content) }}" />
                                </div>
                                <div class="form-group">
                                    <label for="due_date">期限</label>
                                    <input type="date" class="form-control" name="due_date" id="due_date" value="{{ old('due_date', $task->due_date) }}" />
                                </div>
                                <div class="form-group">
                                    <label for="status">優先度</label>
                                    <select class="form-control" name="status" id="status">
                                        @foreach(\App\Task::STATUS as $key => $val)
                                            <option value="{{ $key }}"{{ $key == old('status', $task->status) ? ' selected' : ''}}>
                                                {{ $val['priority']}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info">編集完了</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('share.flatpickr.scripts')
@endsection