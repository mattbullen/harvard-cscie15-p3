<?php

Route::get('/text', function () {
    return view('layouts.text');
});

Route::get('/users', function () {
    return view('layouts.users');
});

Route::get('/unix', function () {
    return view('layouts.unix');
});

Route::get('/password', function () {
    return view('layouts.password');
});

Route::get('/', function () {
    return view('layouts.index');
});

Route::post('/text', 'TextController@getText');

Route::post('/users', 'UsersController@getUsers');

Route::post('/unix', 'UnixController@getUnixPermissions');

Route::post('/password', 'XKCDController@getPassword');