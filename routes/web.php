<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\ContentController;

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

// Route::get('/', function () {
//     return view('dashboard.user.login');
// });

Route::get('/admin', function () {
    return view('dashboard.admin.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// User Routes
Route::middleware(['guest:web', 'PreventBackHistory:web'])->group(function() {

    Route::get('/', [UserController::class, 'login'])->name('user.index');
    Route::get('/user/login', [UserController::class, 'login'])->name('user.login');
    Route::get('/user/register', [UserController::class, 'register'])->name('user.register');
    Route::post('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/check', [UserController::class, 'check'])->name('user.check');
});

Route::middleware(['auth:web', 'PreventBackHistory:web'])->group(function() {

    Route::get('/user/home', [UserController::class, 'index'])->name('user.home');
    Route::post('/user/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::get('/user/level/{id}', [UserController::class, 'level'])->name('user.level');
});

// Admin routes
Route::middleware(['guest:admin', 'PreventBackHistory:admin'])->group(function() {

    Route::view('/admin/login', 'dashboard.admin.login')->name('admin.login');
    Route::post('/admin/check', [AdminController::class, 'check'])->name('admin.check');
});

Route::middleware(['auth:admin', 'PreventBackHistory:admin'])->group(function() {

    Route::get('/admin/home', [AdminController::class, 'home'])->name('admin.home');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::get('/admin/contents/dashboard', [ContentController::class, 'dashboard'])->name('admin.contents.dashboard');
    Route::post('/admin/contents/dashboard-save', [ContentController::class, 'dashboard_save'])->name('admin.contents.dashboard.save');

    Route::get('/admin/contents/login', [ContentController::class, 'login'])->name('admin.contents.login');
    Route::post('/admin/contents/login-save', [ContentController::class, 'login_save'])->name('admin.contents.login.save');

    Route::get('/admin/contents/register', [ContentController::class, 'register'])->name('admin.contents.register');
    Route::post('/admin/contents/register-save', [ContentController::class, 'register_save'])->name('admin.contents.register.save');
    Route::get('/admin/contents/register-add', [ContentController::class, 'register_add'])->name('admin.contents.register.add');
    Route::post('/admin/contents/register-add-save', [ContentController::class, 'register_add_save'])->name('admin.contents.register.add.save');
    Route::get('/admin/contents/register-edit/{id}', [ContentController::class, 'register_edit'])->name('admin.contents.register.edit');
    Route::post('/admin/contents/register-edit-save', [ContentController::class, 'register_edit_save'])->name('admin.contents.register.edit.save');
    Route::get('/admin/contents/register-delete/{id}', [ContentController::class, 'register_delete'])->name('admin.contents.register.delete');

    Route::get('/admin/contents/facebook', [ContentController::class, 'facebook'])->name('admin.contents.facebook');
    Route::post('/admin/contents/facebook-save', [ContentController::class, 'facebook_save'])->name('admin.contents.facebook.save');

    Route::get('/admin/contents/webinar', [ContentController::class, 'webinar'])->name('admin.contents.webinar');
    Route::post('/admin/contents/webinar-save', [ContentController::class, 'webinar_save'])->name('admin.contents.webinar.save');

    Route::get('/admin/levels', [LevelController::class, 'index'])->name('admin.levels');
    Route::get('/admin/levels/add', [LevelController::class, 'add'])->name('admin.levels.add');
    Route::post('/admin/levels/save', [LevelController::class, 'save'])->name('admin.levels.save');
    Route::get('/admin/levels/edit/{id}', [LevelController::class, 'edit'])->name('admin.levels.edit');
    Route::post('/admin/levels/update', [LevelController::class, 'update'])->name('admin.levels.update');
    Route::get('/admin/levels/delete/{id}', [LevelController::class, 'delete'])->name('admin.levels.delete');

    Route::get('/admin/level/{id}', [LevelController::class, 'level_content'])->name('admin.level');
    Route::get('/admin/level/add/{id}', [LevelController::class, 'level_content_add'])->name('admin.level.add');
    Route::post('/admin/level/save', [LevelController::class, 'level_content_save'])->name('admin.level.save');
    Route::get('/admin/level/edit/{lid}/{id}', [LevelController::class, 'level_content_edit'])->name('admin.level.edit');
    Route::post('/admin/level/update', [LevelController::class, 'level_content_update'])->name('admin.level.update');
    Route::get('/admin/level/delete/{lid}/{id}', [LevelController::class, 'level_content_delete'])->name('admin.level.delete');
});
