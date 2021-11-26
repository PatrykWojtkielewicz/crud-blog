<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Models\Post;
use App\Models\Tag;
use App\Models\post_tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('dashboard/admin/posts', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        return view('dashboard.admin.edit_post', compact('post','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        if(!empty($request['post_image'])){
            $path = Storage::disk('public')->put('photos', new File($request->post_image), 'public');
        }
        else if(isset($request->use_old_image)){
            $path = $request->post_old_image;
        }
        else{
            $path = "";
        }
        
        Post::where('id', '=', $request->post_id)->update([
            'title' => $request->post_title,
            'description' => $request->post_content,
            'image' => $path,
            'slug' => Str::slug($request->post_title),
            'user_id' => Auth::id(),
            'active' => (isset($request->post_visibility) ? True : False),
            'likes' => $request->post_likes,
            'dislikes' => $request->post_dislikes,
        ]);

        //operating on new tags
        foreach($request->post_new_tag as $new_tag){
            if($new_tag !== null){
                $tag = Tag::create([
                    'name' => $new_tag,
                ]);
                if(!post_tag::where('post_id', '=', $post->id)->where('tag_id', '=', $tag->id)->exists()){
                    $post->tag()->attach($tag->id);
                }
            }
        }
        //operating on old tags
        foreach($request->post_tag as $i=>$tag_id){
            $record = post_tag::where('post_id', '=', $post->id)->where('tag_id', '=', $tag_id);
            echo $tag_id."=>".$i."<br/>";
            if($tag_id == 0){
                $post->tag()->detach($i);
            }
            else if(!$record->exists()){
                $post->tag()->attach($i);
            }
        }
        return Redirect('dashboard/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return Redirect('dashboard/posts');
    }
}
