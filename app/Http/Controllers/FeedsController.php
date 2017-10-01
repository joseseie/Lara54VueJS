<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedsController extends Controller
{
    public function feed()
    {
        $friends = Auth::user()->friends();
        
        $feed = array();

        foreach ($friends as $friend):

            foreach ($friend->posts as $post):

                array_push($feed,$post);

            endforeach;

        endforeach;


        foreach (Auth::user()->posts as $post):
            array_push($feed,$post);
        endforeach;

        usort($feed,function ($sp1,$sp2) {
            return $sp1->id > $sp2->id;
        });


        return $feed;
        
    }

    public function feeds_like($post_id)
    {
        return Like::where('post_id',$post_id)->get();
    }

}
