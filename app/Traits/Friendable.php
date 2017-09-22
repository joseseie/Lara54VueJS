<?php
namespace  App\Traints;

use App\Friendship;

trait Friendable {

    public function add_friend($user_requested_id)
    {
        $friendship = Friendship::create([
            'requester' => $this->id,
            'user_requested' => $user_requested_id
        ]);

        if($friendship)
        {
            return response()->json($friendship,200);
        }

        return response()->json('fail',501);

    }

    public function accept_friendship($requester)
    {
        $friendship = Friendship::where('requester',$requester)
            ->where('user_requested',$this->id)
            ->first();
        if($friendship){
            $friendship->update([
                'status' => 1
            ]);
            return response()->json($friendship,200);
        }
        return response()->json('fail',501);
    }

    public function friends()
    {
        //Primeiro grupo (Os que enviaram pedido de amizade)
        $friends = array();

        $f1 = Friendship::where('status',1)
                            ->where('requester',$this->id)
                            ->get();

        foreach ($f1 as $friendship):

            array_push($friends,\App\User::find($friendship->user_requested));

        endforeach;

        //second group (Os que receberam pedido de amizade
        $friends2 = array();

        $f2 = Friendship::where('status',1)
            ->where('user_requested',$this->id)
            ->get();

        foreach ($f2 as $friendship):

            array_push($friends2,\App\User::find($friendship->requester));

        endforeach;

        return array_merge($friends,$friends2);

    }

    public function pedding_friends()
    {

        $users = array();

        $friendships = Friendship::where('status',0)
            ->where('user_requested',$this->id)
            ->get();

        foreach ($friendships as $friendship):

            array_push($users,\App\User::find($friendship->requester));

        endforeach;

        return $users;

    }

    public function friends_ids()
    {
        return collect($this->friends())->pluck('id')->toArray();//Converte os ids num array.
    }

    public function is_friends_with($user_id)
    {
        //Verificando se ummcerto id, esta no array dos arrays dos amigos.

        if(in_array($user_id,$this->friends_ids()))
        {
            return response()->json('true',200);
        }
        else
        {
            return response()->json('false',200);
        }
    }



}