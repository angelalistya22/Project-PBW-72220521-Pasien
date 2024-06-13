<?php

use Illuminate\Http\Request;

Route::get('/pasien/v1/search', 'APIController@searchpasien');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});