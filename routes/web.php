<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\AdminNewsController as AdminNewsController;
use App\Http\Controllers\Admin\AdminCatalogController as AdminCatalogController;
use App\Http\Controllers\FormFeedbackController as FormFeedbackController;
use App\Http\Controllers\FormOrderController as FormOrderController;
use App\Http\Controllers\Admin\AdminSourcesController as AdminSourcesController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\ProfileController as ProfileController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\SocialController;
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
Route::get('/start', fn () => view('news.start'))
    ->name('news.start');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/account', AccountController::class)
        ->name('account');

    Route::get('/logout', function (){
        Auth::logout();
        return redirect()->route('login');
    })->name('account.logout');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function() {
    Route::view('/', 'admin.index')->name('admin.index');
    Route::get('/parser', ParserController::class)->name('parser');
    Route::resource('/catalog', AdminCatalogController::class);
    Route::resource('/news', AdminNewsController::class);
    Route::resource('/sources', AdminSourcesController::class);
    Route::match(['post','get'], '/profile', [ProfileController::class, 'update'])->name('updateProfile');
});
});



Route::get('/catalog', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/catalog/{catalog}', [NewsController::class, 'catalog'])
    ->name('news.catalog');
Route::get('/catalog/{catalog}/{news}/', [NewsController::class, 'news'])
    ->name('news.news');

Route::group(['as' => 'forms.'], function() {
Route::view('/feedback', 'forms.index')->name('forms.feedback.index');
Route::resource('/feedback', FormFeedbackController::class);
Route::resource('/order', FormOrderController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'guest'], function () {
    Route::get('auth/{network}/redirect', [SocialController::class, 'redirect'])->name('auth.redirect');
    Route::get('auth/{network}/callback', [SocialController::class, 'callback'])->name('auth.callback');
});
