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
Route::get('/check_relationship_status/{id}',[
    'uses' => 'FriendshipsController@check',
    'as' => 'check'
]);
Route::get('/add_friend/{id}',[
    'uses' => 'FriendshipsController@add_friend',
    'as' => 'add_friend'
]);
Route::get('/accept_friend/{id}',[
    'uses' => 'FriendshipsController@accept_friend',
    'as' => 'accept_friend'
]);


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

