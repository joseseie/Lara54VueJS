<?php
namespace  App\Traints;

use App\Friendship;
trait Frandable
{
    //Para teste.
    public function hello()
    {
        return "Hello friends";
    }

    public function add_friend($user_requested_id)
    {
        $friendship = Friendship::create([
           'requester' => $this->id,
           'user_requested' => $user_requested_id
        ]);

        if($friendship)
        {
            return response()-json($friendship,200);
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
            return response()->json('ok',200);
        }
        return response()->json('fail',501);
    }

}
