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
//
Route::get('/sale', 'FrontController@showProductsSale');
