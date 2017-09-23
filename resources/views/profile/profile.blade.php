@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="col-lg-4">

            <div class="panel panel-default">

                <div class="panel-heading">

                    {{$user->name}}'s profile.

                </div>

                <div class="panel-body">
                    <center>
                        <img src="{{Storage::url($user->avatar)}}" width="70px" height="70px" style="border-radius: 50px" alt="Minha imagem"/>
                        {{--<img src="https://www.gstatic.com/knowledgecard/place-120.png" width="70px" height="70px" style="border-radius: 50px" alt="Minha imagem"/>--}}
                        {{--<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRO5F-aBB3hXT7qnXX-dW3T9uJNiED4oRLUAz2n6pNwLkTlncqJkE9YZaLcDw5XBDrDLCQ" width="70px" height="70px" style="border-radius: 50px" alt="Minha imagem"/>--}}
                    </center>
                </div>

                <p class="text-center">
                    {{$user->profile->location}}
                </p>

                <p class="text-center">
                    @if(Auth::id() == $user->id)
                        <a href="{{route('profile.edit')}}" class="btn btn-lg btn-info">
                            Edit your profile
                        </a>
                    @endif
                </p>

            </div>

            @if(Auth::id() !== $user->id)
                <div class="panel panel-default">

                    <div class="body">

                        <friend :profile_user_id="{{$user->id}}"></friend>

                    </div>

                </div>
            @endif

            <div class="panel panel-default">

                <div class="panel-heading">

                    <p class="text-center">
                        About me
                    </p>

                </div>

                <div class="panel-body">

                    <p class="text-center">
                        {{$user->profile->about}}
                    </p>

                </div>

            </div>

        </div>

    </div>

@stop