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

Route::get('/', 'MainController@main');
Route::get('/about', 'AboutController@about');
Route::get('/contact', 'ContactController@contact');
Route::get('/login', function(){ return 'Login'; });

Route::prefix('/app')->group(function () {
    Route::get('/customers', function(){ return 'Customers'; });
    Route::get('/providers', function(){ return 'Providers'; });
    Route::get('/products', function(){ return 'Products'; });
});


/*
Route::get('/contact/{name}/{category_id}', function(string $name = 'Unamed', int $category_id = 1) {
    echo 'Hello ' . $name .'<br>'. $category_id ;
})->where('category_id', '[0-9]+')->where('name', '[A-Za-z]+');
*/
