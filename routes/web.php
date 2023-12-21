<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::controller(UserController::class)->group(function () {

    Route::get('/', 'showUsers')->name('showusers');

    Route::get('/singleUser/{id?}' , 'singleUser')->name('showUser');

    // Route::match(['get' , 'post'] ,'/adduser' , 'addUser' )->name('adduser');
    Route::post('/adduser', 'addUser')->name('adduser');
    // Route::post('/add-data', 'insertdata');

    Route::post('/updateUser/{id}', 'updateUser')->name('updateUser');

    Route::get('/deleteUser/{id?}' , 'deleteUser')->name('deleteUser');

    Route::get('/updateHelper/{id}' , 'updateHelper')->name('update');
});


Route::view('newuser' , '/form')->name('newuser');

Route::view('/update/{id}' , '/updateuserform' , [ 'id' ] )->name('updateForm');

