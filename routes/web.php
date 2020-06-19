<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::view('contact', 'contact');
Route::view('about', 'about');



Route::get('/', 'LandingPageController@index');

Route::get('blog', 'BlogController@index');
Route::get('post/{slug}', 'BlogController@show');

Route::get('musica', 'MusicaController@index');
Route::get('musica/{slug}', 'MusicaController@show');

Route::get('novidades', 'NovidadesController@index');
Route::get('novidades/{slug}', 'NovidadesController@show');


Route::get('tenis', 'TenisController@index');
Route::get('tenis/{slug}', 'TenisController@show');


Route::get('hacktivismo', 'HacktivismoController@index');
Route::get('hacktivismo/{slug}', 'HacktivismoController@show');

Route::get('category/{slug}', 'CategoriesController@show');

Route::get('{slug}', 'PagesController@show');
