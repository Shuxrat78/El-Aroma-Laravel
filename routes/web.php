<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

// Route::get('/about', function () {
//     return view('about');
// })->name('about');

// Route::get('/contact', function () {
//     return view('contact');
// })->name('contact');

Route::get('/', 'App\Http\Controllers\ProductController@productView')->name('product-view');
Route::post('/', 'App\Http\Controllers\ProductController@productView')->name('product-view');
Route::post('/', 'App\Http\Controllers\ProductController@productReq')->name('product-req');

Route::get('/brendsubmit', 'App\Http\Controllers\BrandController@brend_submit')->name('brend-submit');
Route::get('/brendview', 'App\Http\Controllers\BrandController@brendView')->name('brend-view');

Route::get('/categorysubmit', 'App\Http\Controllers\CategoryController@category_submit')->name('category-submit');
Route::get('/categoryview', 'App\Http\Controllers\CategoryController@categoryView')->name('category-view');

Route::get('/capacitysubmit', 'App\Http\Controllers\CapacityController@capacity_submit')->name('capacity-submit');
Route::get('/capacityview', 'App\Http\Controllers\CapacityController@capacityView')->name('capacity-view');

Route::get('/product-new', 'App\Http\Controllers\ProductController@productNew')->name('product-new');
Route::post('/product-new-submit', 'App\Http\Controllers\ProductController@productNewSubmit')->name('product-new-submit');

Route::post('/product-edit-submit/{id}', 'App\Http\Controllers\ProductController@productEditSubmit')->name('product-edit-submit');

Route::get('/products', 'App\Http\Controllers\ProductController@productList')->name('product-list');

Route::get('/update-foto', 'App\Http\Controllers\ProductController@updateFoto')->name('update-foto');
Route::post('/update-foto-submit', 'App\Http\Controllers\ProductController@updateFotoSubmit')->name('update-foto-submit');

/*Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});*/
