<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Model\Post::truncate();  // 先清理表数据
        factory(\App\Model\Post::class, 20)->create();
    }
}
