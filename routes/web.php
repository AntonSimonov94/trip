<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\AdminNewsController as AdminNewsController;
use App\Http\Controllers\Admin\AdminCatalogController as AdminCatalogController;
use App\Http\Controllers\FormFeedbackController as FormFeedbackController;
use App\Http\Controllers\FormOrderController as FormOrderController;
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

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::view('/', 'admin.index')->name('admin.index');
    Route::resource('/catalog', AdminCatalogController::class);
    Route::resource('/news', AdminNewsController::class);

});



Route::get('/catalog', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/catalog/{name}', [NewsController::class, 'category'])
    ->name('news.category');
Route::get('/catalog/{name}/{id}', [NewsController::class, 'news'])
    ->name('news.news');

Route::group(['as' => 'forms.'], function() {
Route::view('/feedback', 'forms.index')->name('forms.feedback.index');
Route::resource('/feedback', FormFeedbackController::class);
Route::resource('/order', FormOrderController::class);
});
