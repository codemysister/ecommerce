<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
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

Route::prefix('brand')->group(function () {
    Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brands');
    Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
    Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');
    Route::post('/update', [BrandController::class, 'BrandUpdate'])->name('brand.update');
    Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');
});

Route::prefix('category')->group(function () {
    Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.categories');
    Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
    Route::post('/update', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
    Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');

    Route::get('sub/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategories');
    Route::post('sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
    Route::get('/sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
    Route::post('sub/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
    Route::get('sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');

    Route::get('sub/sub/view', [SubCategoryController::class, 'SubSubCategoryView'])->name('all.subsubcategories');
    Route::get('/subcategory/ajax/{id}', [SubCategoryController::class, 'GetSubCategory']);
});
