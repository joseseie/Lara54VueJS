<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public $with = ['user','likes']; //Ja vai trazer o post junto com user como padrao.

    protected $fillable = ['content','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }


}
