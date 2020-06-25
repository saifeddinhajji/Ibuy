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

Auth::routes();
Route::get('/', function () {return view('auth.login');})->middleware('guest');
Route::get('/register',function(){ return back()->withInput();})->middleware('auth');



/********************************gestion des utlisateurs **********************************/
Route::get('/home','HomeController@index')->name('home')->middleware('auth');
Route::post('/addustlisateur','UserController@add')->name('adduser')->middleware('auth');
Route::get('/deleteutlisateur/{id}','UserController@delete')->name('deleteuser')->middleware('auth');
Route::get('/toadmin/{id}','UserController@toadmin')->name('toadmin')->middleware('auth');
Route::get('/togerant/{id}','UserController@togerant')->name('togerant')->middleware('auth');

/********************************gestion des categories **********************************/
Route::get('/categories','CategorieController@index')->name('categories')->middleware('auth');
Route::get('/deletecategorie/{id}','CategorieController@delete')->name('deletecategorie')->middleware('auth');
Route::post('/updatecategorie/{id}','CategorieController@update')->name('updatecategorie')->middleware('auth');
Route::post('/addcategorie','CategorieController@add')->name('addcategorie')->middleware('auth');
Route::get('/detailcategorie/{id}','CategorieController@detail')->name('detailcategorie')->middleware('auth');

/**************************** gestion produits******************/
Route::get('/products','ProduitController@index')->name('products')->middleware('auth');
Route::get('/deleteproduit/{id}','ProduitController@delete')->name('deleteproduit')->middleware('auth');
Route::post('/updateproduit/{id}','ProduitController@update')->name('updateproduit')->middleware('auth');
Route::post('/addproduit','ProduitController@add')->name('addproduit')->middleware('auth');
Route::post('/searchproduit','ProduitController@search')->name('searchproduit');
///php artisan db:seed --class=UserSeeder