<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // ログインユーザーのデータがあるかチェック
        $task = Auth::user()->tasks()->first();
        // タスクが一つもなければホーム画面へ
        if(is_null($task)){
            return view('home');
        }
        // タスクが存在したらタスク一覧へ
        return redirect()->route('tasks.index', [
            'id' => $task->id,
        ]);
    }
}
