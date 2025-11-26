<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 3) as $num) {
            DB::table('tasks')->insert([
                'folder_id' => 1,
                'title' => "サンプルタスク",
                'status' => $num,
                'due_date' => Carbon::now()->addDay($num),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        $user = DB::table('users')->where('id', 2)->first();
        $folder = DB::table('folders')->where('user_id', $user->id)->first();

        foreach (range(1, 3) as $num) {
            DB::table('tasks')->insert([
                'folder_id' => $folder->id,
                'title' => "サンプルタスク {$num}（test2）",
                'status' => $num,
                'due_date' => Carbon::now()->addDay($num),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        //
    }
}
