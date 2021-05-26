<?php

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

//page d'accueil
Route::get('/', 'FrontController@index');
//route pour afficher un livre, route sécurisée
Route::get('product/{id}', 'FrontController@show')->where(['id' => '[0-9]+']);
//route pour afficher une catégorie, route sécurisée
Route::get('category/{id}', 'FrontController@showProductsByCategory')->where(['id' => '[0-9]+']);
//route vers page soldes
Route::get('/sale', 'FrontController@showProductsSale')->where(['id' => '[0-9]+']);
// auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
// Contrôleur de resource
Route::resource('/admin', 'ProductController')->middleware('auth');