<?php

Route::get('/test', function () {
    return Redirect::to('/');
});

Route::get('/password', function () {
    return view('password');
});

Route::get('/text', function () {
    return view('text');
});

Route::get('/users', function () {
    return view('users');
});

Route::get('/', function () {
    return view('index');
});

Route::post('/text', 'TextController@getText');

Route::post('/users', 'UsersController@getUsers');

Route::post('/password', 'XKCDController@getPassword');