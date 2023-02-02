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

Route::get('/', function (\Illuminate\Http\Request $request) {
    return view('main');
});

Route::get('/error', function (\Illuminate\Http\Request $request) {
    return view('error');
})->name('error.page');

Route::get('/register', function (\Illuminate\Http\Request $request) {
    return redirect('error.page');
});

Route::get('/login', function (\Illuminate\Http\Request $request) {
    return redirect('error.page');
});

Route::middleware('auth')->group(function() {
    Route::get('/filesystem', function (\Illuminate\Http\Request $request) {
        return redirect('error.page');
    });

    Route::get('/forums', function (\Illuminate\Http\Request $request) {
        return view('error');
    });

    Route::get('/forum/{id}', function (\Illuminate\Http\Request $request) {
        return view('error');
    });

    Route::get('/topic/{id}', function (\Illuminate\Http\Request $request) {
        return view('error');
    });
});
