<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permission;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;

class DashBoardPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $permissions = Permission::all();
        $posts = Post::all();
        return view('dashboard.admin.posts', compact('users','permissions','posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request){
        $path = Storage::disk('public')->put('photos', new File($request['post_image']), 'public');
        Post::where('id', '=', $request->post_id)->update([
            'title' => $request['post_title'],
            'description' => $request['post_content'],
            'image' => $path,
            'slug' => Str::slug($request['post_title']),
            'user_id' => Auth::id(),
            'active' => 1,
        ]);
        return Redirect('dashboard/posts');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $arr = explode('-', $request->action);
        $action = $arr[0];
        $post_id = $arr[1];
        switch($action){
            case 'edit':
                $post = Post::where('id', '=', $post_id)->first();
                $users = User::all();
                return view('dashboard.admin.edit_post', compact('post','users'));
                break;
            case 'hide':
                $status = Post::where('id', '=', $post_id)->value('active');
                if($status == 1){
                    Post::where('id', '=', $post_id)->update(['active' => 0]);
                }
                else if($status == 0){
                    Post::where('id', '=', $post_id)->update(['active' => 1]);
                }
                return Redirect('dashboard/posts');
                break;
            case 'delete':
                $this->destroy($post_id);
                return Redirect('dashboard/posts');
                break;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
    }
}
