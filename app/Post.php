<?php

namespace App;

use App\Traints\PostsTrait;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
//    use Traits\PostsTrait;

    public $with = ['user']; //Ja vai trazer o post junto com user como padrao.
    // public $with = ['user','likes']; //Ja vai trazer o post junto com user como padrao.
    
    protected $fillable = ['content','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }


    /*Aditional Methods added*/

//    public function likesOfThisPost()
//    {
//        return
////        dd($this->id);
//
//    }

    /*The aditional methods ends here*/

}
