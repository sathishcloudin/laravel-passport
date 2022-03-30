<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\NewsController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//  Route::get('/category', [categoryController::class,'cateindex']);
// Route::get('/category', [categoryController::class,'index'])->middleware(['auth'])->name('dashboard');

// Route::get('/news', [NewsController::class,'index'])->middleware(['auth'])->name('dashboard');

// // entha route vanthu category.balde.php insert panra ku "add" ngara thu category.balde.php page la 302 line la route ahh use panni iruken so apo atha run agum 
// // category_save categoryController.php 89 line la public function na use panni iruken
// Route::post('/add',[categoryController::class,'category_save'])->name('add');
// // enga use panra category_delete vanthu category.blade.php la 349 line use panniruku apo tha delete agum
// Route::get('/category_delete/{user}', [categoryController::class, 'category_destroy'])->name('users.category_delete');
// Route::GET('/cate_edit/{user}', [categoryController::class, 'cate_edit'])->name('users.cate_edit');
// Route::post('cate_update', [categoryController::class, 'cate_update'])->name('users.cate_update');
// // entha route vanthu news.balde.php insert panra ku  "news" ngara thu news.balde.php page la 302 line la route ahh use panni iruken so apo atha run agum 
// // news_save NewsController.php 86 line la public function na use panni iruken
// Route::post('/add_news',[NewsController::class,'news_save'])->name('news');
// Route::get('/delete/{user}', [NewsController::class, 'destroy'])->name('users.destroy');
// Route::GET('/edit/{user}', [NewsController::class, 'edit'])->name('users.edit');
// Route::post('update', [NewsController::class, 'update'])->name('users.update');

require __DIR__.'/auth.php';
