<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\post_tag;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<15; $i++){
            post_tag::create([
                'post_id' => ($i+1),
                'tag_id' => rand(1, 5),
            ]);
            post_tag::create([
                'post_id' => ($i+1),
                'tag_id' => rand(1, 5),
            ]);
            post_tag::create([
                'post_id' => ($i+1),
                'tag_id' => rand(1, 5),
            ]);
        }
    }
}
