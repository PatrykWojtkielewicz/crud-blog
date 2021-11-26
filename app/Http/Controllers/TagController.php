<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class TagController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($tag_name)
    {
        $allposts = Post::with('tag')->get();
        $posts = [];
        //chooses only unique posts with given tag_name
        foreach($allposts as $post){
            foreach($post->tag as $tag){
                if($tag->name == $tag_name){
                    array_push($posts, $post);
                    break;
                }
            }
        }
        return view('tag', compact('posts', 'tag_name'));
    }
}
