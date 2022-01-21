<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', fn () => view('news.start'))
    ->name('news.start');

Route::get('/catalog', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/catalog/{name}', [NewsController::class, 'category'])
    ->name('news.category');
Route::get('/catalog/{name}/{des}', [NewsController::class, 'news'])
    ->name('news.news');
