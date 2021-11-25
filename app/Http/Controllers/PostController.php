<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\File;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;
use App\Models\Dislike;
use App\Models\Comment;
use App\Models\Permission;
use App\Models\Tag;
use App\Models\post_tag;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post)
    {
        $post = Post::where('slug', '=', $post)->first();
        $comments = Comment::where('post_id', '=', $post->id)->get();

        $permission = (Auth::check()) ? Permission::where('id', '=', Auth::user()->permission_id)->value('name') : 'user';

        $liked = Like::where('user_id', '=', Auth::id())->where('post_id', '=', $post->id)->exists();
        $disliked = Dislike::where('user_id', '=', Auth::id())->where('post_id', '=', $post->id)->exists();

        return view('display_post', compact('post','comments','permission','liked','disliked'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->permission_id == 1){
            $tags = Tag::all();
            return view('new_post', compact('tags'));
        }
        else{
            return Redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $path = !empty($request->post_image) ? Storage::disk('public')->put('photos', new File($request->post_image), 'public') : "";

        $post = Post::create([
            'title' => $request->post_title,
            'description' => $request->post_content,
            'image' => $path,
            'slug' => Str::slug($request->post_title),
            'user_id' => Auth::id(),
            'active' => 1,
            'likes' => 0,
            'dislikes' => 0,
        ]);
        $alltags = array();
        foreach($request->post_new_tag as $new_tag){
            if($new_tag !== null){
                $tag = Tag::create([
                    'name' => $new_tag,
                ]);
                $ptag = post_tag::create([
                    'post_id' => $post->id,
                    'tag_id' => $tag->id,
                ]);
                echo("<br/><br/>");
            }
        }
        foreach($request->post_tag as $new_tag){
            post_tag::create([
                'post_id' => $post->id,
                'tag_id' => $new_tag,
            ]);
        }
        //return Redirect('/');
    }
}
