@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="column col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-right">
                            <a href="{{ route('tasks.create') }}" class="btn btn-default btn-block">やることを追加</a>
                            <p class="text-center">「期限」、「優先度」をクリックすると並び替えができます！</p>
                        </div>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>やること</th>
                            @if(isset($due_date))
                                <th>
                                    <a href="{{ route('tasks.index',['sort' => $sort, 'due_date' => $due_date]) }}" style="color:#434a54; text-decoration:underline;">期限</a>
                                </th>
                            @else
                                <th>
                                    <a href="{{ route('tasks.index',['sort' => $sort]) }}" style="color:#434a54; text-decoration:underline;">期限</a>
                                </th>
                            @endif
                            @if(isset($status))
                                <th>
                                    <a href="{{ route('tasks.index', ['sort' => $sort, 'status' => $status]) }}" style="color:#434a54; text-decoration:underline;">優先度</a>
                                </th>
                            @else
                                <th>
                                    <a href="{{ route('tasks.index', ['sort' => $sort]) }}" style="color:#434a54; text-decoration:underline;">優先度</a>
                                </th>
                            @endif
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td>
                                    <span class="">&#9675;{{ $task->content }}</span>
                                </td>
                                <td>
                                    <span class="" style="font-size:16px">{{ $task->format_due_date }}</span>
                                </td>
                                <td class="status">
                                    <span class="badge {{ $task->status_class }}" style="font-size:16px">{{ $task->status_priority }}<span>
                                </td>
                                <td>
                                    <a href="{{ route('tasks.edit',['id' => $task->id]) }}" class="text-secondary">編集</a>
                                </td>
                                <td>
                                    <a href="{{ route('tasks.delete',['id' => $task->id]) }}" onClick="return delete_alert();" class="text-secondary">削除</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection

<script>
    function delete_alert(e){
        if(!window.confirm('削除しますか？')){
            return false;
        }
        document.forms.deleteform.submit();
    }
</script>

@section('scripts')
    @include('share.flatpickr.scripts')
@endsection
