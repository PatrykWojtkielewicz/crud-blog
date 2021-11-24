<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Like;
use App\Models\Dislike;

class LikeController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Like::where('user_id', '=', Auth::id())->where('post_id', '=', $id)->exists()){
            Post::where('id', '=', $id)->update(['likes' => DB::raw('likes-1')]);
            $this->destroy($id);
        }
        else{
            if(Dislike::where('user_id', '=', Auth::id())->where('post_id', '=', $id)->exists()){
                Post::where('id', '=', $id)->update(['dislikes' => DB::raw('dislikes-1')]);
                Dislike::where('post_id', '=', $id)->delete();
                Post::where('id', '=', $id)->update(['likes' => DB::raw('likes+1')]);
                Like::create([
                    'post_id' => $id,
                    'user_id' => Auth::id(),
                ]);
            }
            else{
                Post::where('id', '=', $id)->update(['likes' => DB::raw('likes+1')]);
                Like::create([
                    'post_id' => $id,
                    'user_id' => Auth::id(),
                ]);
            }
        }
        $slug = Post::where('id', '=', $id)->value('slug');
        return Redirect()->route('post.show', ['post' => $slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Like::where('post_id', '=', $id)->delete();
    }
}
