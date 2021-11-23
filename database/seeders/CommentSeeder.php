<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<15; $i++){
            Comment::create([
                'user_id' => '2',
                'post_id' => ($i+1),
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum magna eros, placerat vel faucibus vel, facilisis sit amet nunc',
            ]);
            Comment::create([
                'user_id' => '4',
                'post_id' => ($i+1),
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum magna eros, placerat vel faucibus vel, facilisis sit amet nunc',
            ]);
            Comment::create([
                'user_id' => '6',
                'post_id' => ($i+1),
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum magna eros, placerat vel faucibus vel, facilisis sit amet nunc',
            ]);
        }
    }
}
