<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        /* call seeder list */
        $this->call(FolderTableSeeder::class);
        $this->call(TasksTableSeeder::class);
        // 他のシーダーも必要に応じて追加
    }
}
