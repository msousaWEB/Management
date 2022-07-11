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

Route::get('/', 'MainController@main')->name('site.index')->middleware('log.access');
Route::get('/about', 'AboutController@about')->name('site.about');
Route::get('/contact', 'ContactController@contact')->name('site.contact');
Route::post('/contact', 'ContactController@save')->name('site.contact');
Route::get('/login', function(){ return 'Login'; })->name('site.login');

Route::middleware('authentication:default,visitor')->prefix('/app')->group(function () {
    Route::get('/customers', function(){ return 'Customers'; })->name('app.customers');
    Route::get('/providers', 'ProvidersController@index')->name('app.providers');
    Route::get('/products', function(){ return 'Products'; })->name('app.products');
});

// // TRABALHANDO COM REDIRECIONAMENTO
// Route::get('/test/{p1}/{p2}', 'TestController@test')->name('test');
// FALLBACK

Route::fallback(function () {
    echo 'This page does not exist. ' . '<a href="'.route('site.index').'">Back to Home.</a>';
});

// ENCAMINHAR PARAMETROS