<?php

use Illuminate\Support\Facades\Route;

 // Route::get('/', '\Corals\Foundation\Http\Controllers\PublicBaseController@welcome');



Route::get('live', function(){
	return view('test');
});

// Route::get('watchstreaming', function(){
// 	return view('livestreaming');
// });

Route::get('index', function(){
    return view('test');
});


Route::get('watchstream', function(){
    return view('secondtest');
});

Route::get('topup', function(){
	return view('topup');
});