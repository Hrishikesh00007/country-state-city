<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WebsiteController;

// Route::get('/', function () {
//     return view('welcome');
// });


//Route::get('/',[ CustomerController:: class,'showCustomer'] )->name('home');

Route::get('/', [WebsiteController::class, 'index'])->name('home');

Route::post('/getState', [WebsiteController::class, 'getState']);
//Route::post('/getCity', [WebsiteController::class,'getCity']);

//Route::post('/add', [WebsiteController::class, 'addCustomer'])->name('addCustomer');

Route::post('/ajaxupload', [WebsiteController::class, 'upload']);

Route::post('/ajaxuploadstate', [WebsiteController::class, 'uploadstate']);

Route::post('/ajaxuploadcity', [WebsiteController::class, 'uploadcity']);


Route::get('/world', [WebsiteController::class, 'worldlist']);
