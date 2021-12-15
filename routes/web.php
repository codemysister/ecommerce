<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\AdminProfileController;
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

Route::get('/', [IndexController::class, 'index']);
Route::get('/user/edit', [IndexController::class, 'edit']);
Route::post('/user/update', [IndexController::class, 'update']);
Route::get('/user/change/password', [IndexController::class, 'changePassword']);
Route::post('/user/update/password', [IndexController::class, 'updatePassword']);
Route::get('/user/logout', [IndexController::class, 'logout'])->name('user.logout');

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});


Route::get('admin/profile', [AdminProfileController::class, 'adminProfile'])->name('admin.profile');
Route::get('admin/profile/edit', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
Route::post('admin/profile/update', [AdminProfileController::class, 'update'])->name('admin.profile.update');
Route::get('admin/change/password', [AdminProfileController::class, 'changePassword'])->name('admin.change.password');
Route::post('update/change/password', [AdminProfileController::class, 'updatePassword'])->name('update.change.password');
Route::get('admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');


Route::middleware(['auth:sanctum,admin', 'verified'])->get('admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');




Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard', compact('user'));
})->name('dashboard');
