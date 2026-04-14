<?php

use Illuminate\Support\Facades\Route;

# @metodo y name nos dice cómo llamar la ruta
Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");

# Mala practica meter lógica acá
# Ese return va a about.blade.php, es decir, el "html" de esta url, y ahi son pasadas a la vista base de la que hereda
Route::get('/about', function () {
    $data1 = "About us - Online Store";
    $data2 = "About us";
    $description = "This is an about page ...";
    $author = "Developed by: Daniela";
    return view('home.about')->with("title", $data1)
      ->with("subtitle", $data2)
      ->with("description", $description)
      ->with("author", $author);
})->name("home.about");

# Este código deberia ir en un controller de ABout, pues son como los views.py en django, entonces las funciones deben ir ahi

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
# Hay que ponerlo aqui porque si no espera un int luego de products/, y como le llega un str, se daña
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name("product.create");
Route::post('/products/save', 'App\Http\Controllers\ProductController@save')->name("product.save"); 
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");

Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
Route::get('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");
Route::get('/cart/removeAll/', 'App\Http\Controllers\CartController@removeAll')->name("cart.removeAll");

Route::get('/image', 'App\Http\Controllers\ImageController@index')->name("image.index");
Route::post('/image/save', 'App\Http\Controllers\ImageController@save')->name("image.save");

Route::get('/image-not-di', 'App\Http\Controllers\ImageNotDIController@index')->name("imagenotdi.index");
Route::post('/image-not-di/save', 'App\Http\Controllers\ImageNotDIController@save')->name("imagenotdi.save");