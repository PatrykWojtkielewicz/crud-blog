<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\post_tag;

class PostTagSeeder extends Seeder
{
    private function UniqueTags($min, $max, $quantity) {
        $numbers = range($min, $max);
        shuffle($numbers);
        return array_slice($numbers, 0, $quantity);
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<15; $i++){
            $ut = $this->UniqueTags(1,8,3);
            post_tag::create([
                'post_id' => ($i+1),
                'tag_id' => $ut[0],
            ]);
            post_tag::create([
                'post_id' => ($i+1),
                'tag_id' => $ut[1],
            ]);
            post_tag::create([
                'post_id' => ($i+1),
                'tag_id' => $ut[2],
            ]);
        }
    }
}
