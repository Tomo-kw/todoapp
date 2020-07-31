<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ユーザーを一行だけ取得
        $user = DB::table('users')->first();

        foreach(range(1, 3) as $num){
            DB::table('tasks')->insert([
                'content' => "テストタスク {$num}",
                'user_id' => $user->id,
                'due_date' => Carbon::now()->addDay($num),
                'status' => $num,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
