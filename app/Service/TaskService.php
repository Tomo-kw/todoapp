<?php

namespace App\Service;

class TaskService
{

    public function sort(string $range, string $sort)
    {
        if (is_null($sort)) {
            // 全てのタスクを取得し昇順に並び替え
            $tasks = Auth::user()->tasks()->orderBy('id', 'asc')
                ->get();
            return [
                'tasks' => $tasks,
                'sort' => "asc",
                'status' => "status",
                'due_date' => "due_date",
            ];
        }

        // データを取得しソート
        $tasks = Auth::user()->tasks()->orderBy($range, $sort)
            ->get();
        return [
            'tasks' => $tasks,
            'sort' => $sort,
            'status' => "status",
            'due_date' => "due_date",
        ];
    }
}
