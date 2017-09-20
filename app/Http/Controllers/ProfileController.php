<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index($slug)
    {
        $user = User::where('slug',$slug)->first();
        return view('profile.profile')
        ->with('user',$user);
    }

    public function edit()
    {
        return view('profile.edit')->with('info',Auth::user()->profile);
    }

    public function update(Request $r)
    {
        $this->validate($r,[
            'location' => 'required',
            'about' => 'required|max:255'
        ]);

        Auth::user()->profile()->update([
            'location' => $r->input('location'),
            'about' => $r->input('about')
        ]);

        if($r->hasFile('avatar'))
        {
            Auth::user()->update([
                'avatar' => $r->avatar ->store('public/avatars')
            ]);
        }
        dd($r>all());
        Session::flash('success','perfil actualizado.');

        return redirect()->back();
    }
}
