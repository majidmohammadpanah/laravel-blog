<?php

use Illuminate\Support\Facades\Route;

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





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', 'App\Http\Controllers\HomeController@index' )->name('home');
Route::get('/articles' , 'App\Http\Controllers\ArticleController@index')->name('articles');
Route::get('/article/{articleSlug}' , 'App\Http\Controllers\ArticleController@single')->name('article.single');
Route::get('/articles/category/{categorySlug}','App\Http\Controllers\CategoryController@articles')->name('category.articles');
Route::get('/articles/tag/{tagSlug}','App\Http\Controllers\TagController@articles')->name('tag.articles');
// -------------------- Login With Google and Github -----------------------------
Route::get('/auth/google' ,'App\Http\Controllers\Auth\GoogleAuthController@redirect')->name('auth.google');
Route::get('/auth/google/callback' ,'App\Http\Controllers\Auth\GoogleAuthController@callback');

Route::get('/auth/github' ,'App\Http\Controllers\Auth\GithubAuthController@redirect')->name('auth.github');
Route::get('/auth/github/callback' ,'App\Http\Controllers\Auth\GithubAuthController@callback');

//-----Sitemap -------------------------------------------------------------------
Route::get('/sitemap','App\Http\Controllers\SitemapController@index');
Route::get('/sitemap-articles','App\Http\Controllers\SitemapController@articles');

//-----Feed -------------------------------------------------------------------
Route::feeds();
//-----Admin---------------------------------------------------------------------------
Route::prefix('admin')->middleware('auth')->middleware(['auth','verified','password.confirm','auth.admin'])->group(function () {

    Route::get('/','App\Http\Controllers\Admin\HomeController@index')->name('admin');
    //Articles
    Route::resource('/articles','App\Http\Controllers\Admin\ArticleController');
    //Tags
    Route::resource('/tags','App\Http\Controllers\Admin\TagController');
    //Category
    Route::resource('/categories','App\Http\Controllers\Admin\CategoryController');
    //CK editor Upload Images
    Route::post('/upload-image','App\Http\Controllers\Admin\AdminController@uploadImagesCkeditor')->name('ckeditor.upload');

});
