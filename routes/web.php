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
Route::get('/login/{error?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@auth')->name('site.login');

Route::middleware('authentication:default,visitor')->prefix('/app')->group(function () {
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/quit', 'LoginController@quit')->name('app.quit');

    /////////////////////////////////PROVIDER////////////////////////////////
    Route::get('/provider', 'ProvidersController@index')->name('app.provider');
    Route::post('/provider/list_provider', 'ProvidersController@list')->name('app.provider.list');
    Route::get('/provider/list_provider', 'ProvidersController@list')->name('app.provider.list');
    Route::get('/provider/add_provider', 'ProvidersController@add')->name('app.provider.add');
    Route::post('/provider/add_provider', 'ProvidersController@add')->name('app.provider.add');
    Route::get('/provider/edit_provider/{id}/{msg?}', 'ProvidersController@edit')->name('app.provider.edit');
    Route::get('/provider/delete_provider/{id}', 'ProvidersController@delete')->name('app.provider.delete');
    
    /////////////////////////////////PRODUTOS/////////////////////////////////
    Route::resource('product', 'ProductController');

    //DETALHES
    Route::resource('product-detail', 'ProductDetailController');

    /////////////////////////////////CLIENTES/////////////////////////////////
    Route::resource('customer', 'CustomerController');
    Route::resource('ordered', 'OrderedController');
    // Route::resource('ordered-product', 'OrderedProductController');
    Route::get('ordered-product/create/{ordered}', 'OrderedProductController@create')->name('ordered-product.create');
    Route::post('ordered-product/store/{ordered}', 'OrderedProductController@store')->name('ordered-product.store');
    // Route::delete('ordered-product.destroy/{ordered}/{product}', 'OrderedProductController@destroy')->name('ordered-product.destroy');
    Route::delete('ordered-product.destroy/{orderedProduct}/{ordered_id}', 'OrderedProductController@destroy')->name('ordered-product.destroy');

});

// // TRABALHANDO COM REDIRECIONAMENTO
// Route::get('/test/{p1}/{p2}', 'TestController@test')->name('test');
// FALLBACK

Route::fallback(function () {
    echo 'This page does not exist. ' . '<a href="'.route('site.index').'">Back to Home.</a>';
});

// ENCAMINHAR PARAMETROS