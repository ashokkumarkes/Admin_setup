<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Wallet;
Route::any('category/create', [CategoryController::class, 'createCategory'])->middleware(['auth', 'verified'])->name('createCategory');
Route::get('/permission',[PermissionController::class,'index'])->name('permission.index')->middleware(['auth', 'verified']);
Route::get('/add-permission',[PermissionController::class,'create'])->name('add-permission')->middleware(['auth', 'verified']);
Route::post('/store-permission',[PermissionController::class,'store'])->name('permission.store')->middleware(['auth', 'verified']);

Route::get('/role',[RoleController::class,'create'])->name('role')->middleware(['auth', 'verified']);
Route::get('/role-list',[RoleController::class,'index'])->name('roles.index')->middleware(['auth', 'verified']);
Route::get('/show-role/{id}',[RoleController::class,'show'])->name('roles.show')->middleware(['auth', 'verified']);
Route::get('/edit/{id}',[RoleController::class,'show'])->name('roles.edit')->middleware(['auth', 'verified']);
Route::post('/store',[RoleController::class,'store'])->name('roles.store')->middleware(['auth', 'verified']);

Route::get('/', function () {
    // cache(['name'=>'Ashok Kumar',$seconds=10]);
    return view('welcome');
});

Route::get('/user-profile', function () {
    $data = auth()->user();
    //https://github.com/bavix/laravel-wallet
    return view('f_pages.profile',compact('data'));
})->middleware(['auth', 'verified'])->name('user-profile');

Route::get('/blank', function () {
    return view('f_pages.blank');
})->middleware(['auth', 'verified'])->name('blank');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


 
Route::controller(wallet::class)->group(function () {
    Route::get('/add-wallet-amount', 'index')->middleware(['auth', 'verified'])->name('add-wallet-amount');
    Route::post('/add-wallet-amount', 'store')->middleware(['auth', 'verified'])->name('add-amount');
});

// Route::get('/add-wallet-amount',[Wallet::class,'index'])->middleware(['auth', 'verified'])->name('add-wallet-amount');
require __DIR__.'/auth.php';
