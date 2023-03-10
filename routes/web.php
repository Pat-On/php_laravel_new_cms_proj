<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post'); // binding

Route::middleware('auth')->group(function () {
    Route::get('/admin', [App\Http\Controllers\AdminsController::class, 'index'])->name('admin.index');

    Route::get('/admin/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
    Route::post('/admin/posts', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    Route::get('/admin/posts', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');

    //route model binding
    Route::delete('/admin/posts/{post}/destroy', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
    Route::patch('/admin/posts/{post}/update', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');

    Route::put('admin/users/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.profile.update');

    Route::delete('admin/users/{user}/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
});

// policy
Route::get('/admin/posts/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->middleware('can:view,post')->name('post.edit');

Route::middleware(['role:Admin'])->group(function () {
    Route::get('admin/users', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');

    Route::put('/users/{user}/attach', [App\Http\Controllers\UserController::class, 'attach'])->name('user.role.attach');

    Route::put('/users/{user}/detach', [App\Http\Controllers\UserController::class, 'detach'])->name('user.role.detach');
});

Route::middleware(['can:view,user'])->group(function () {
    Route::get('admin/users/{user}/profile', [App\Http\Controllers\UserController::class, 'show'])->name('user.profile.show');
});

// authorization permissions

//roles
Route::get('/admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('role.index');
Route::post('/admin/roles', [App\Http\Controllers\RoleController::class, 'store'])->name('role.store');
Route::delete('/admin/roles/{role}/destroy', [App\Http\Controllers\RoleController::class, 'destroy'])->name('role.destroy');
Route::get('/admin/roles/{role}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('role.edit');
Route::put('/admin/roles/{role}/update', [App\Http\Controllers\RoleController::class, 'update'])->name('role.update');
Route::put('/admin/roles/{role}/attach', [App\Http\Controllers\RoleController::class, 'attach_permission'])->name('role.permission.attach');
Route::put('/admin/roles/{role}/detach', [App\Http\Controllers\RoleController::class, 'detach_permission'])->name('role.permission.detach');

//permissions
Route::get('/admin/permissions', [App\Http\Controllers\PermissionController::class, 'index'])->name('permission.index');
Route::post('/admin/permissions', [App\Http\Controllers\PermissionController::class, 'store'])->name('permission.store');
Route::delete('/admin/permissions/{permission}/destroy', [App\Http\Controllers\PermissionController::class, 'destroy'])->name('permission.destroy');
Route::get('/admin/permissions/{permission}/edit', [App\Http\Controllers\PermissionController::class, 'edit'])->name('permission.edit');
Route::put('/admin/permissions/{permission}/update', [App\Http\Controllers\PermissionController::class, 'update'])->name('permission.update');
