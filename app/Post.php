<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{

    public $with = ['user']; //Ja vai trazer o post junto com user como padrao.

    protected $fillable = ['content','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
