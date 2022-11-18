<?php
namespace App\Http\Controllers;
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
Route::get('/permission',[PermissionController::class,'index'])->name('permission.index');
Route::get('/add-permission',[PermissionController::class,'create'])->name('add-permission');
Route::post('/store-permission',[PermissionController::class,'store'])->name('permission.store');

Route::get('/role',[RoleController::class,'create'])->name('role');
Route::get('/role-list',[RoleController::class,'index'])->name('roles.index');
Route::get('/show-role/{id}',[RoleController::class,'show'])->name('roles.show');
Route::get('/edit/{id}',[RoleController::class,'show'])->name('roles.edit');
Route::post('/store',[RoleController::class,'store'])->name('roles.store');

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
