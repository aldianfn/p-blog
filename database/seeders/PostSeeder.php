<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'id' => Str::uuid(),
                'title' => 'Post 1',
                'content' => 'This is post to check if app is going well',
                'user_id' => '01hywbwj047dc1crt4cbm3mh5s',
            ],
        ];

        DB::table('posts')->insert($posts);
    }
}
