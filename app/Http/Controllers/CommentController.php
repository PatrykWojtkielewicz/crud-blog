<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        Comment::create([
            'user_id' => $request['author_id'],
            'post_id' => $request['post_id'],
            'content' => $request['content'],
        ]);
        return Redirect()->route('post.show.comment', ['post' => $request->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        foreach($request->delete as $id){
            Comment::destroy($id);
        }
        return Redirect()->route('post.show.comment', ['post' => $request->slug]);
    }
}
