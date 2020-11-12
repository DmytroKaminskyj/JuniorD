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

Route::get('/', function () {
    return view('home');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('rest', 'RestTestController')->names('restTest');

Route::group(['namespace'=> 'Blog','prefix' => 'blog'], function () {
    Route::resource('/posts', 'PostController')->names('blog.posts');
    Route::resource('/posts', 'PostController')->except([
        'create', 'store', 'update', 'destroy'
    ]);
});
// Admin Panel
$groupData = [
    'namespace' => 'Blog\Admin',
    'prefix' => 'admin/blog',
];
Route::group($groupData,function (){
    //BlogCategory
    $methods = ['index','edit','update','create','store',];
    Route::resource('categories', 'CategoryController')
    ->only($methods)
    ->names('blog.admin.categories');
});
