<?php

use Illuminate\Support\Facades\Route;

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
    return view('new_request');
});

 Auth::routes(['register' => false]);

Route::get('/new_request', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/new_request', function () {
    return view('new_request');
})->name('new_request');

Route::get('/request_list', function () {
    return view('request_list');
})->middleware('auth');

Route::get('/request_edit/{id_request}', function () {
    return view('request_edit');
})->middleware('auth');

//Route::get('/request_list', function () {
//    return view('request_list');
//})->name('request_list');

//Route::get('/request_edit', function () {
//    return view('request_edit');
//})->name('request_edit');

Route::post('/complete_request', [App\Http\Controllers\RequestListViewController::class, 'store'])->name('complete_request');

Route::get('/request_list', [App\Http\Controllers\request_listController::class, 'index'])->name('index_rs');

Route::get('/request_list', [App\Http\Controllers\RequestStatusController::class, 'userId'])->name('request_list');

// Route::get('/request_list', [App\Http\Controllers\request_listController::class, 'pag'])->name('request_list_pag');

// Route::get('/request_edit/{id_request}', [App\Http\Controllers\RequestStatusController::class, 'u'])->name('request_edit.userId');

Route::post('/request_edit/{id_request}', [App\Http\Controllers\RequestStatusController::class, 'store'])->name('request_edit.userId_');

Route::get('/search', [App\Http\Controllers\request_listController::class, 'search'])->name('search');

Route::get('/request_list', [App\Http\Controllers\UserController::class, 'index'])->name('index');

// Route::get('/request_list/{id_request}', [App\Http\Controllers\RequestStatusController::class, 'u'])->name('request_edit.userId');


