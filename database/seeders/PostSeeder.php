<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<15; $i+=3){
            Post::create([
                'title' => 'Post '.($i+1),

                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ultricies nec magna quis volutpat. Nunc lobortis lectus eu porttitor eleifend. Sed condimentum libero in velit ornare dictum. Sed at nisi at libero tincidunt dignissim. Donec id risus varius, aliquet lectus sed, finibus eros. Praesent blandit scelerisque posuere. Nunc mi metus, volutpat semper vehicula at, gravida quis dolor. Proin ultricies iaculis velit, non placerat nisi sodales a. Aliquam interdum arcu vel eleifend porttitor. Mauris hendrerit lacus tempus lectus pharetra, volutpat consequat nisi sollicitudin.
                Donec ut augue malesuada sapien viverra malesuada ac sed est. Aenean eget dui justo. Pellentesque hendrerit velit nunc, nec vestibulum sapien luctus a. Maecenas a ipsum dui. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam fermentum maximus velit at hendrerit. Sed pretium quam gravida dui malesuada molestie. Nam ac ipsum arcu. Sed dui nisi, ultrices et turpis nec, congue imperdiet elit. Integer pretium porttitor metus. Donec rhoncus erat diam, sit amet pretium nunc malesuada id. Donec aliquet magna at magna hendrerit, at bibendum nunc molestie.
                Duis quis diam eu dui mollis sagittis et sed libero. Donec aliquam eros odio. Quisque varius felis nec magna gravida, sed vehicula dui bibendum. Integer venenatis dui et ligula tincidunt fringilla. Vestibulum ornare velit laoreet ligula aliquam, sed fermentum massa porttitor. Pellentesque in ornare nisl, vel congue risus. Donec fermentum aliquet felis. Nam augue tortor, tempus in porta ac, iaculis vitae quam. Nam eget feugiat orci, et dapibus urna. Fusce ac tortor a arcu faucibus tincidunt. Curabitur eu leo ac nisl malesuada malesuada.
                Nullam id nisi tortor. Morbi lectus justo, imperdiet vel ipsum in, volutpat semper nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed molestie pretium metus, id maximus leo gravida vitae. Morbi sollicitudin cursus leo ac mollis. Sed eu lacus tellus. Nam ut erat dapibus, tempor massa lacinia, vestibulum nisi. Nullam nisi massa, eleifend at tortor sit amet, facilisis tincidunt turpis. Etiam pulvinar libero est. Nam ac mi non enim viverra dignissim.
                Quisque massa purus, convallis ut ante a, aliquet porttitor felis. Nulla lacinia lorem aliquam, dictum nunc at, egestas nibh. Sed arcu sapien, iaculis sit amet nisi id, accumsan consectetur diam. Maecenas in nisi id sem dignissim ullamcorper et ac ex. Nam placerat elit in felis porttitor mattis. Etiam vel hendrerit mi. Nunc et egestas massa, nec pellentesque orci. Vestibulum vel ante at risus euismod congue. Ut at lorem neque.',

                'image' => 'photos/TytoFbZEDVNX1M01ZJTuE3HBNNvNAroN5aSBFshP.jpg',
                'slug' => Str::slug('Post '.($i+1)),
                'user_id' => "1",
                'active' => "1",
                'likes' => "25",
                'dislikes' => "10",

            ]);

            Post::create([
                'title' => 'Post '.($i+2),

                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ultricies nec magna quis volutpat. Nunc lobortis lectus eu porttitor eleifend. Sed condimentum libero in velit ornare dictum. Sed at nisi at libero tincidunt dignissim. Donec id risus varius, aliquet lectus sed, finibus eros. Praesent blandit scelerisque posuere. Nunc mi metus, volutpat semper vehicula at, gravida quis dolor. Proin ultricies iaculis velit, non placerat nisi sodales a. Aliquam interdum arcu vel eleifend porttitor. Mauris hendrerit lacus tempus lectus pharetra, volutpat consequat nisi sollicitudin.
                Donec ut augue malesuada sapien viverra malesuada ac sed est. Aenean eget dui justo. Pellentesque hendrerit velit nunc, nec vestibulum sapien luctus a. Maecenas a ipsum dui. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam fermentum maximus velit at hendrerit. Sed pretium quam gravida dui malesuada molestie. Nam ac ipsum arcu. Sed dui nisi, ultrices et turpis nec, congue imperdiet elit. Integer pretium porttitor metus. Donec rhoncus erat diam, sit amet pretium nunc malesuada id. Donec aliquet magna at magna hendrerit, at bibendum nunc molestie.
                Duis quis diam eu dui mollis sagittis et sed libero. Donec aliquam eros odio. Quisque varius felis nec magna gravida, sed vehicula dui bibendum. Integer venenatis dui et ligula tincidunt fringilla. Vestibulum ornare velit laoreet ligula aliquam, sed fermentum massa porttitor. Pellentesque in ornare nisl, vel congue risus. Donec fermentum aliquet felis. Nam augue tortor, tempus in porta ac, iaculis vitae quam. Nam eget feugiat orci, et dapibus urna. Fusce ac tortor a arcu faucibus tincidunt. Curabitur eu leo ac nisl malesuada malesuada.
                Nullam id nisi tortor. Morbi lectus justo, imperdiet vel ipsum in, volutpat semper nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed molestie pretium metus, id maximus leo gravida vitae. Morbi sollicitudin cursus leo ac mollis. Sed eu lacus tellus. Nam ut erat dapibus, tempor massa lacinia, vestibulum nisi. Nullam nisi massa, eleifend at tortor sit amet, facilisis tincidunt turpis. Etiam pulvinar libero est. Nam ac mi non enim viverra dignissim.
                Quisque massa purus, convallis ut ante a, aliquet porttitor felis. Nulla lacinia lorem aliquam, dictum nunc at, egestas nibh. Sed arcu sapien, iaculis sit amet nisi id, accumsan consectetur diam. Maecenas in nisi id sem dignissim ullamcorper et ac ex. Nam placerat elit in felis porttitor mattis. Etiam vel hendrerit mi. Nunc et egestas massa, nec pellentesque orci. Vestibulum vel ante at risus euismod congue. Ut at lorem neque.',

                'image' => 'photos/TM2YL2kXEQj46EDE84Fqi5PAJ0f8YK4vFHuju2Ex.jpg',
                'slug' => Str::slug('Post '.($i+2)),
                'user_id' => "1",
                'active' => "1",
                'likes' => "25",
                'dislikes' => "10",

            ]);

            Post::create([
                'title' => 'Post '.($i+3),

                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ultricies nec magna quis volutpat. Nunc lobortis lectus eu porttitor eleifend. Sed condimentum libero in velit ornare dictum. Sed at nisi at libero tincidunt dignissim. Donec id risus varius, aliquet lectus sed, finibus eros. Praesent blandit scelerisque posuere. Nunc mi metus, volutpat semper vehicula at, gravida quis dolor. Proin ultricies iaculis velit, non placerat nisi sodales a. Aliquam interdum arcu vel eleifend porttitor. Mauris hendrerit lacus tempus lectus pharetra, volutpat consequat nisi sollicitudin.
                Donec ut augue malesuada sapien viverra malesuada ac sed est. Aenean eget dui justo. Pellentesque hendrerit velit nunc, nec vestibulum sapien luctus a. Maecenas a ipsum dui. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam fermentum maximus velit at hendrerit. Sed pretium quam gravida dui malesuada molestie. Nam ac ipsum arcu. Sed dui nisi, ultrices et turpis nec, congue imperdiet elit. Integer pretium porttitor metus. Donec rhoncus erat diam, sit amet pretium nunc malesuada id. Donec aliquet magna at magna hendrerit, at bibendum nunc molestie.
                Duis quis diam eu dui mollis sagittis et sed libero. Donec aliquam eros odio. Quisque varius felis nec magna gravida, sed vehicula dui bibendum. Integer venenatis dui et ligula tincidunt fringilla. Vestibulum ornare velit laoreet ligula aliquam, sed fermentum massa porttitor. Pellentesque in ornare nisl, vel congue risus. Donec fermentum aliquet felis. Nam augue tortor, tempus in porta ac, iaculis vitae quam. Nam eget feugiat orci, et dapibus urna. Fusce ac tortor a arcu faucibus tincidunt. Curabitur eu leo ac nisl malesuada malesuada.
                Nullam id nisi tortor. Morbi lectus justo, imperdiet vel ipsum in, volutpat semper nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed molestie pretium metus, id maximus leo gravida vitae. Morbi sollicitudin cursus leo ac mollis. Sed eu lacus tellus. Nam ut erat dapibus, tempor massa lacinia, vestibulum nisi. Nullam nisi massa, eleifend at tortor sit amet, facilisis tincidunt turpis. Etiam pulvinar libero est. Nam ac mi non enim viverra dignissim.
                Quisque massa purus, convallis ut ante a, aliquet porttitor felis. Nulla lacinia lorem aliquam, dictum nunc at, egestas nibh. Sed arcu sapien, iaculis sit amet nisi id, accumsan consectetur diam. Maecenas in nisi id sem dignissim ullamcorper et ac ex. Nam placerat elit in felis porttitor mattis. Etiam vel hendrerit mi. Nunc et egestas massa, nec pellentesque orci. Vestibulum vel ante at risus euismod congue. Ut at lorem neque.',

                'image' => 'photos/TsWSfnpntfxLQXcNK1v2uctibnTjX4pKBPqiK3lg.jpg',
                'slug' => Str::slug('Post '.($i+3)),
                'user_id' => "1",
                'active' => "1",
                'likes' => "25",
                'dislikes' => "10",

            ]);
        }
    }
}
