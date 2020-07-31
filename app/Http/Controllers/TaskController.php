<?php

namespace App\Http\Controllers;

use App\Task;
// クラスのインポート
use Illuminate\Http\Request;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;
use App\Http\Requests\DeleteTask;
// Authクラスのインポート
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * タスク一覧の表示及びソート
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $sort = $request->sort;

        if(is_null($sort)){
            // 全てのタスクを取得し昇順に並び替え
            $tasks = Auth::user()->tasks()->orderBy('id', 'asc')
                ->get();
            return view('tasks/index', [
                'tasks' => $tasks,
                'sort' => "asc",
                'status' => "status",
                'due_date' => "due_date",
            ]);           
        }

        // 期限・優先度どちらをクリックしたかのチェック
        if(is_null($request->status)){
            $range = $request->due_date;
        }else{
            $range = $request->status;
        }
        
        // データを取得しソート
        if($sort == 'asc'){
            $tasks = Auth::user()->tasks()->orderBy($range, 'asc')
            ->get();
            return view('tasks/index', [
                'tasks' => $tasks,
                'sort' => "desc",
                'status' => "status",
                'due_date' => "due_date",
            ]);
        }elseif($sort = 'desc'){
            $tasks = Auth::user()->tasks()->orderBy($range, 'desc')
            ->get();
            return view('tasks/index', [
                'tasks' => $tasks,
                'sort' => "asc",
                'status' => "status",
                'due_date' => "due_date",
            ]);
        }
    }

    /**
     * タスク作成フォーム
     * @return \Illuminate\View\View
     */
    public function showCreate()
    {
        return view('tasks/create');
    }

    /**
     * タスク登録
     * @param CreateTask $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(CreateTask $request)
    {
        $tasks = new Task();
        // リクエスト中の入力値をプロパティとして取得
        $tasks->content = $request->content;
        $tasks->user_id = $request->user_id;
        $tasks->due_date = $request->due_date;
        $tasks->status = $request->status;
        // ユーザーに紐付けて保存
        Auth::user()->tasks()->save($tasks);

        return redirect()->route('tasks.index');
    }

    /**
     * 編集画面表示
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function showEdit(int $id)
    {
        $task = TASK::find($id);
        
        return view('tasks/edit', [
            'task' => $task,
        ]);
    }

    /**
     * 編集後の登録
     * @param int $id
     * @param EditTask $request
     */
    public function edit(int $id, EditTask $request)
    {
        $task = Task::find($id);
        $task->content = $request->content;
        $task->due_date = $request->due_date;
        $task->status = $request->status;
        $task->save();

        return redirect()->route('tasks.index');
    }

    /**
     * 削除処理
     * @param int $id
     * @param DeleteTask $request
     */
    public function delete(int $id, DeleteTask $request)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect()->route('tasks.index');
    }

}