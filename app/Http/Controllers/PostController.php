<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\File;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($post)
    {
        $post = Post::where('slug', '=', $post)->first();
        $author = User::where('id', '=', $post->user_id)->value('name');
        $users = User::all();
        $comments = Comment::where('post_id', '=', $post->id)->get();
        if(Auth::check()){
            $permission = Permission::where('id', '=', Auth::user()->permission_id)->value('name');
        }
        else{
            $permission = 'user';
        }
        return view('display_post', compact('post','author','comments','users','permission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->permission_id == 1){
            return view('new_post');
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
        if(!empty($request['post_image'])){
            $path = Storage::disk('public')->put('photos', new File($request['post_image']), 'public');
        }
        else{
            $path = "";
        }
        Post::create([
            'title' => $request['post_title'],
            'description' => $request['post_content'],
            'image' => $path,
            'slug' => Str::slug($request['post_title']),
            'user_id' => Auth::id(),
            'active' => 1,
        ]);
        return Redirect('/');
    }
}
