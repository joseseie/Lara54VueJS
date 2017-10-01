<?php

namespace App\Http\Controllers;

use Auth;
use App\Like;
use App\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like($id)
    {
        $post = Post::find($id);

        $like = Like::create([
            'user_id' => Auth::id(),
            'post_id' => $post->id
        ]);

        return Like::find($like->id);
    }

    public function unlike($id)
    {
        $post = Post::find($id);

        Like::where('user_id',Auth::id())
            ->where('post_id',$post->id)
            ->first()
            ->delete();

        return 1;

    }



}
