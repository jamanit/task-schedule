<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\C_user::class, 'index'])->name('user_index');
    Route::get('/create', [App\Http\Controllers\C_user::class, 'create'])->name('user_create');
    Route::post('/store', [App\Http\Controllers\C_user::class, 'store'])->name('user_store');
    Route::get('/edit/{id}', [App\Http\Controllers\C_user::class, 'edit'])->name('user_edit');
    Route::put('/update/{id}', [App\Http\Controllers\C_user::class, 'update'])->name('user_update');
    Route::delete('/destroy/{id}', [App\Http\Controllers\C_user::class, 'destroy'])->name('user_destroy');
});

Route::prefix('menu')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\C_menu::class, 'index'])->name('menu_index');
    Route::post('/firstmenu_store', [App\Http\Controllers\C_menu::class, 'firstmenu_store'])->name('menu_firstmenu_store');
    Route::post('/secondmenu_store', [App\Http\Controllers\C_menu::class, 'secondmenu_store'])->name('menu_secondmenu_store');
    Route::post('/thirdmenu_store', [App\Http\Controllers\C_menu::class, 'thirdmenu_store'])->name('menu_thirdmenu_store');
    Route::post('/fourthmenu_store', [App\Http\Controllers\C_menu::class, 'fourthmenu_store'])->name('menu_fourthmenu_store');

    Route::put('/firstmenu_update/{id}', [App\Http\Controllers\C_menu::class, 'firstmenu_update'])->name('menu_firstmenu_update');
    Route::put('/secondmenu_update/{id}', [App\Http\Controllers\C_menu::class, 'secondmenu_update'])->name('menu_secondmenu_update');
    Route::put('/thirdmenu_update/{id}', [App\Http\Controllers\C_menu::class, 'thirdmenu_update'])->name('menu_thirdmenu_update');
    Route::put('/fourthmenu_update/{id}', [App\Http\Controllers\C_menu::class, 'fourthmenu_update'])->name('menu_fourthmenu_update');

    Route::delete('/firstmenu_destroy/{id}', [App\Http\Controllers\C_menu::class, 'firstmenu_destroy'])->name('menu_firstmenu_destroy');
    Route::delete('/secondmenu_destroy/{id}', [App\Http\Controllers\C_menu::class, 'secondmenu_destroy'])->name('menu_secondmenu_destroy');
    Route::delete('/thirdmenu_destroy/{id}', [App\Http\Controllers\C_menu::class, 'thirdmenu_destroy'])->name('menu_thirdmenu_destroy');
    Route::delete('/fourthmenu_destroy/{id}', [App\Http\Controllers\C_menu::class, 'fourthmenu_destroy'])->name('menu_fourthmenu_destroy');

    Route::get('/firstmenu_list', [App\Http\Controllers\C_menu::class, 'firstmenu_list'])->name('menu_firstmenu_list');
    Route::get('/secondmenu_list', [App\Http\Controllers\C_menu::class, 'secondmenu_list'])->name('menu_secondmenu_list');
    Route::get('/thirdmenu_list', [App\Http\Controllers\C_menu::class, 'thirdmenu_list'])->name('menu_thirdmenu_list');
});

Route::prefix('level')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\C_level::class, 'index'])->name('level_index');
    Route::get('/create', [App\Http\Controllers\C_level::class, 'create'])->name('level_create');
    Route::post('/store', [App\Http\Controllers\C_level::class, 'store'])->name('level_store');
    Route::get('/edit/{id}', [App\Http\Controllers\C_level::class, 'edit'])->name('level_edit');
    Route::put('/update/{id}', [App\Http\Controllers\C_level::class, 'update'])->name('level_update');
    Route::delete('/destroy/{id}', [App\Http\Controllers\C_level::class, 'destroy'])->name('level_destroy');
});

Route::prefix('accessmenu')->middleware('auth')->group(function () {
    Route::get('/create/{id}', [App\Http\Controllers\C_accessmenu::class, 'create'])->name('accessmenu_create');
    Route::post('/store/{id}', [App\Http\Controllers\C_accessmenu::class, 'store'])->name('accessmenu_store');
});

Route::prefix('category')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\C_category::class, 'index'])->name('category_index');
    Route::get('/create', [App\Http\Controllers\C_category::class, 'create'])->name('category_create');
    Route::post('/store', [App\Http\Controllers\C_category::class, 'store'])->name('category_store');
    Route::get('/edit/{id}', [App\Http\Controllers\C_category::class, 'edit'])->name('category_edit');
    Route::put('/update/{id}', [App\Http\Controllers\C_category::class, 'update'])->name('category_update');
    Route::delete('/destroy/{id}', [App\Http\Controllers\C_category::class, 'destroy'])->name('category_destroy');
});

Route::prefix('program')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\C_program::class, 'index'])->name('program_index');
    Route::get('/create', [App\Http\Controllers\C_program::class, 'create'])->name('program_create');
    Route::post('/store', [App\Http\Controllers\C_program::class, 'store'])->name('program_store');
    Route::get('/edit/{id}', [App\Http\Controllers\C_program::class, 'edit'])->name('program_edit');
    Route::put('/update/{id}', [App\Http\Controllers\C_program::class, 'update'])->name('program_update');
    Route::delete('/destroy/{id}', [App\Http\Controllers\C_program::class, 'destroy'])->name('program_destroy');
});

Route::prefix('module')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\C_module::class, 'index'])->name('module_index');
    Route::get('/create', [App\Http\Controllers\C_module::class, 'create'])->name('module_create');
    Route::post('/store', [App\Http\Controllers\C_module::class, 'store'])->name('module_store');
    Route::get('/edit/{id}', [App\Http\Controllers\C_module::class, 'edit'])->name('module_edit');
    Route::put('/update/{id}', [App\Http\Controllers\C_module::class, 'update'])->name('module_update');
    Route::delete('/destroy/{id}', [App\Http\Controllers\C_module::class, 'destroy'])->name('module_destroy');
});

Route::prefix('status')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\C_status::class, 'index'])->name('status_index');
    Route::get('/create', [App\Http\Controllers\C_status::class, 'create'])->name('status_create');
    Route::post('/store', [App\Http\Controllers\C_status::class, 'store'])->name('status_store');
    Route::get('/edit/{id}', [App\Http\Controllers\C_status::class, 'edit'])->name('status_edit');
    Route::put('/update/{id}', [App\Http\Controllers\C_status::class, 'update'])->name('status_update');
    Route::delete('/destroy/{id}', [App\Http\Controllers\C_status::class, 'destroy'])->name('status_destroy');
});

Route::prefix('taskschedule')->middleware('auth')->group(function () {
    Route::match(['get', 'post'], '/', [App\Http\Controllers\C_taskschedule::class, 'index'])->name('taskschedule_index');
    Route::get('/create', [App\Http\Controllers\C_taskschedule::class, 'create'])->name('taskschedule_create');
    Route::post('/store', [App\Http\Controllers\C_taskschedule::class, 'store'])->name('taskschedule_store');
    Route::get('/edit/{id}', [App\Http\Controllers\C_taskschedule::class, 'edit'])->name('taskschedule_edit');
    Route::put('/update/{id}', [App\Http\Controllers\C_taskschedule::class, 'update'])->name('taskschedule_update');
    Route::delete('/destroy/{id}', [App\Http\Controllers\C_taskschedule::class, 'destroy'])->name('taskschedule_destroy');
});
