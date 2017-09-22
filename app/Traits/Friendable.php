<?php
namespace  App\Traints;

use App\Friendship;

trait Friendable {

    public function add_friend($user_requested_id)
    {
        if($this->id === $user_requested_id)
        {
            return 0;
        }
        if($this->is_friends_with($user_requested_id) === 1)
        {
            return "Voces ja sao amigos";
        }
        if($this->has_pending_friend_request_sent_to($user_requested_id) === 1)
        {
            return "Ja enviou o pedido de amizade.";
        }
        if($this->has_pending_friend_request_from($user_requested_id) === 1)
        {
            return $this->accept_friend($user_requested_id);
        }
        $friendship = Friendship::create([
            'requester' => $this->id,
            'user_requested' => $user_requested_id
        ]);

        if($friendship)
        {
            return 1;
        }

        return 0;

    }

    public function accept_friend($requester)
    {
        if($this->has_pending_friend_request_from($requester) == 0)
        {
            return 0;
        }
        $friendship = Friendship::where('requester',$requester)
            ->where('user_requested',$this->id)
            ->first();
        if($friendship){
            $friendship->update([
                'status' => 1
            ]);
            return 1;
        }
        return 0;
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

    public function pending_friend_requests()
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
    public function pending_friend_requests_sent()
    {

        $users = array();

        $friendships = Friendship::where('status',0)
            ->where('requester',$this->id)
            ->get();

        foreach ($friendships as $friendship):

            array_push($users,\App\User::find($friendship->user_requested));

        endforeach;

        return $users;

    }
    public function has_pending_friend_request_from($user_id)
    {

        if(in_array($user_id,$this->pending_friend_request_ids()))
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public function has_pending_friend_request_sent_to($user_id)
    {

        if(in_array($user_id,$this->pending_friend_requests_sent_ids()))
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public function friends_ids()
    {
        return collect($this->friends())->pluck('id')->toArray();//Converte os ids num array.
    }
    public function pending_friend_request_ids()
    {
        return collect($this->pending_friend_requests())->pluck('id')->toArray();//Converte os ids num array.
    }
    public function pending_friend_requests_sent_ids()
    {
        return collect($this->pending_friend_requests_sent())->pluck('id')->toArray();//Converte os ids num array.
    }

    public function is_friends_with($user_id)
    {
        //Verificando se ummcerto id, esta no array dos arrays dos amigos.

        if(in_array($user_id,$this->friends_ids()))
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }



}