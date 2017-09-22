<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/add_friend',function (){
    return \App\User::find(1)->add_friend(4);
});
Route::get('/accept_friend',function (){
    return \App\User::find(4)->accept_friendship(1);
});
Route::get('/friends',function (){
    return \App\User::find(1)->friends();
});
Route::get('/pedding_friends',function (){
    return \App\User::find(4)->pedding_friends();
});
Route::get('/ids',function (){
    return \App\User::find(4)->friends_ids();
});

Route::get('/is',function (){
    return \App\User::find(1)->is_friends_with(30);
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/profile/{slug}',[
        'uses'=>'ProfileController@index',
        'as' => 'profile'//Dando pseudonimo a rota.
    ]);
    Route::get('/profile/edit/profile',[
        'uses'=>'ProfileController@edit',
        'as' => 'profile.edit'//Dando   pseudonimo a rota.
    ]);
    Route::post('/profile/update/profile',[
        'uses'=>'ProfileController@update',
        'as' => 'profile.update'//Dando pseudonimo a rota.
    ]);
});

