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

Route::get('/', 'MainController@main')->name('site.index');
Route::get('/about', 'AboutController@about')->name('site.about');
Route::get('/contact', 'ContactController@contact')->name('site.contact');
Route::get('/login', function(){ return 'Login'; })->name('site.login');

Route::prefix('/app')->group(function () {
    Route::get('/customers', function(){ return 'Customers'; })->name('app.customers');
    Route::get('/providers', function(){ return 'Providers'; })->name('app.providers');
    Route::get('/products', function(){ return 'Products'; })->name('app.products');
});


/*
Route::get('/contact/{name}/{category_id}', function(string $name = 'Unamed', int $category_id = 1) {
    echo 'Hello ' . $name .'<br>'. $category_id ;
})->where('category_id', '[0-9]+')->where('name', '[A-Za-z]+');
*/
