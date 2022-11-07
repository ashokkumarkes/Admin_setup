<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
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
Route::get('/user-profile', function () {
    $data = auth()->user();
    return view('f_pages.profile',compact('data'));
})->middleware(['auth', 'verified'])->name('user-profile');
Route::get('/blank', function () {
    return view('f_pages.blank');
})->middleware(['auth', 'verified'])->name('blank');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
