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

Route::get('/','FormuleController@init');



Route::get('/formule','FormuleController@index');
Route::get('/formule/{id}','FormuleController@view');


Route::get('/produit','ProduitController@index');
Route::get('/produit/{id}','ProduitController@view');

Route::get('/supplement','SupplementController@index');

Route::post('/ajouterFormule','PanierController@ajouterFormule');
Route::post('/ajouterProduit','PanierController@ajouterProduit');
Route::post('/ajouterSupplement','PanierController@ajouterSupplement');

Route::get('/panier','PanierController@index');
Route::get('/valider','PanierController@valider');

Route::post('/supprimerFormule','PanierController@supprimerFormule');
Route::post('/supprimerProduit','PanierController@supprimerProduit');
Route::post('/supprimerSupplement','PanierController@supprimerSupplement');


Auth::routes();

Route::get('/home', 'FormuleController@index');
Route::post('/payment','PanierController@payment');
Route::get('/payer','PanierController@payer');
