<?php

namespace App\Http\Controllers;

use App\Posts;
use Auth;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function store(Request $request)
    {
       return Posts::create([
            'user_id' => Auth::id(),
            'content' =>  $request->conteudo
        ]);
    }

}
