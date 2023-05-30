<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostLikesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('post_likes')->insert([
            'post_id' => random_int(1, 50),
            'user_id' => random_int(1, 25),
            'num_of_likes' => random_int(1, 10),
        ]);
    }
}
