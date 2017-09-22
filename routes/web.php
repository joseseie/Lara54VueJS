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

