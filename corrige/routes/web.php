<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\MemoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MemoController::class, 'publicshow']);
Route::view('/signin','signin')->name('view_signin');
Route::view('/signup', 'signup')->name('view_signup');
Route::get('/publicview',[MemoController::class, 'public_show'])->name('view_public');
Route::get('/onememo',[MemoController::class, 'show_one'])->name('view_one');
route::get('/modification', [MemoController::class, 'modif'])->name('view_modif');

Route::post('/authenticate', [UserController::class, 'connect'])->name('user_authenticate');
Route::post('/adduser', [UserController::class, 'create'])->name('user_adduser');

Route::prefix('admin')->middleware('auth.myuser')->group(function () {
	Route::view('/account', 'account')->name('view_account');
	Route::view('/formpassword','formpassword')->name('view_formpassword');

	Route::post('/changepassword', [UserController::class, 'updatePassword'])->name('user_changepassword');
	Route::get('/deleteuser', [UserController::class, 'delete'])->name('user_deleteuser');
	Route::get('/signout', [UserController::class, 'disconnect'])->name('user_signout');

	Route::prefix('note')->group(function () {
		Route::view('/addmemo', 'formmemo')->name('view_formmemo');
		Route::post('/addmemo', [MemoController::class,'add'])->name('memo_add');
		Route::get('/list',[MemoController::class,'show'])->name('memo_show');
		Route::post('/modifmemo', [MemoController::class,'memo_modif'])->name('memo_modif');
	});
});
