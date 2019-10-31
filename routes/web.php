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

//bon de commande road


Auth::routes();

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' =>'index'
]);


Route::get('bondecommande',[
    'as' =>'bon_commande_path',
    'uses' =>'BonCommandeController@index',
    'middleware' => 'auth',
]);
Route::get('boncommande',[
    'as' =>'bon_commande_add_path',
    'uses' =>'BonCommandeController@create',
    'middleware' => 'auth',
]);

Route::get('boncommande/show/{id}',[
    'as' =>'bon_commande_show_path/{id}',
    'uses' =>'BonCommandeController@show',
    'middleware' => 'auth',
]);

Route::get('boncommande/edit/{id}',[
    'as' =>'bon_commande_edit_path/{id}',
    'uses' =>'BonCommandeController@edit',
    'middleware' => 'auth',
]);
Route::get('boncommande/print/{id}',[
    'as' =>'bon_commande_print_path/{id}',
    'uses' =>'BonCommandeController@print',
    'middleware' => 'auth',
]);

Route::get('boncommande/delete/{id}',[
    'as' =>'bon_commande_delete_path/{id}',
    'uses' =>'BonCommandeController@destroy',
    'middleware' => 'auth',
]);
Route::post('bc/delete/article',[
    'as'=>'delete_article_path',
    'middleware' => 'auth',
    'uses'=>'BonCommandeController@delete'
]);
Route::post('boncommande',[
    'as' =>'bon_commande_add_path',
    'uses' =>'BonCommandeController@store',
]);

//facture road

Route::get('factures',[
    'as' =>'facture_path',
    'uses' =>'FactureController@index',
    'middleware' => 'auth',
]);
Route::get('facture',[
    'as' =>'facture_add_path',
    'uses' =>'FactureController@create',
    'middleware' => 'auth',
]);
Route::post('facture/delete/article',[
    'as'=>'delete_article_facture_path',
    'middleware' => 'auth',
    'uses'=>'FactureController@delete'
]);
Route::post('facture',[
    'as' =>'facture_add_path',
    'uses' =>'FactureController@store',
    'middleware' => 'auth',
]);

Route::get('facture/print/{id}',[
    'as' =>'facture_print_path/{id}',
    'uses' =>'FactureController@print',
    'middleware' => 'auth',
]);

Route::get('facture/show/{id}',[
    'as' =>'facture_show_path/{id}',
    'uses' =>'FactureController@show',
    'middleware' => 'auth',
]);



//users & Role road

Route::get('utilisateurs',[
    'as' =>'utilisateurs_path',
    'uses' =>'UserController@index',
    'middleware' => 'auth',
]);

Route::get('roles',[
    'as' =>'roles_path',
    'uses' =>'UserController@getAllRole',
    'middleware' => 'auth',
]);

Route::get('role/add',[
    'as' =>'roles_add_path',
    'uses' =>'UserController@newRole',
    'middleware' => 'auth',
]);

Route::get('role/edit/{id}',[
    'as' =>'roles_edit_path/{id}',
    'uses' =>'UserController@editRole',
    'middleware' => 'auth',
]);

Route::get('role/delete/{id}',[
    'as' =>'roles_delete_path/{id}',
    'uses' =>'UserController@destroyRole',
    'middleware' => 'auth',
]);
Route::get('utilisateur',[
    'as' =>'user_add_path',
    'uses' =>'UserController@create',
    'middleware' => 'auth',
]);

Route::get('utilisateur/edit/{id}',[
    'as' =>'user_edit_path/{id}',
    'uses' =>'UserController@edit',
    'middleware' => 'auth',
]);

Route::get('utilisateur/delete/{id}',[
    'as' =>'user_delete_path/{id}',
    'uses' =>'UserController@destroy',
    'middleware' => 'auth',
]);
Route::post('utilisateur/update/',[
    'as'=>'utilisateur_update_path',
    'middleware' => 'auth',
    'uses'=>'UserController@update'
]);
Route::post('utilisateur',[
    'as' =>'utilisateur_add_path',
    'uses' =>'UserController@store',
    'middleware' => 'auth',
]);

Route::post('role/add',[
    'as' =>'role_add_path',
    'uses' =>'UserController@postRole',
    'middleware' => 'auth',
]);

Route::post('role/update',[
    'as' =>'role_update_path',
    'uses' =>'UserController@updateRole',
    'middleware' => 'auth',
]);

//fournisseur road
Route::get('fournisseurs',[
    'as' =>'fournisseur_path',
    'uses' =>'FournisseurController@index',
    'middleware' => 'auth',
]);
Route::get('fournisseur',[
    'as' =>'fournisseur_add_path',
    'uses' =>'FournisseurController@create',
    'middleware' => 'auth',
]);
Route::get('fournisseur/show/{id}',[
    'as' =>'fournisseur_show_path/{id}',
    'uses' =>'FournisseurController@show',
    'middleware' => 'auth',
]);
Route::get('fournisseur/edit/{id}',[
    'as' =>'fournisseur_edit_path/{id}',
    'uses' =>'FournisseurController@edit',
    'middleware' => 'auth',
]);
Route::post('fournisseur',[
    'as' =>'fournisseur_add_path',
    'uses' =>'FournisseurController@store',
    'middleware' => 'auth',
]);
Route::post('fournisseur/update',[
    'as' =>'update_fournisseur_path',
    'uses' =>'FournisseurController@update',
    'middleware' => 'auth',
]);
Route::post('fournisseur/delete',[
    'as' =>'delete_fournisseur_path',
    'uses' =>'FournisseurController@delete',
    'middleware' => 'auth',
]);

//produits road


Route::get('produits',[
    'as' =>'produit_path',
    'uses' =>'ProduitController@index',
    'middleware' => 'auth',
]);
Route::get('produit',[
    'as' =>'produit_add_path',
    'uses' =>'ProduitController@create',
    'middleware' => 'auth',
]);
Route::post('produit',[
    'as' =>'produit_add_path',
    'uses' =>'ProduitController@store',
    'middleware' => 'auth',
]);


//Article road


Route::get('articles',[
    'as' =>'article_path',
    'uses' =>'ArticleController@index',
    'middleware' => 'auth',
]);
Route::get('article',[
    'as' =>'article_add_path',
    'uses' =>'ArticleController@create',
    'middleware' => 'auth',

]);
Route::post('article',[
    'as' =>'article_add_path',
    'uses' =>'ArticleController@store',
    'middleware' => 'auth',
]);
Route::post('article/delete',[
    'as' =>'article_delete_path',
    'uses' =>'ArticleController@delete',
    'middleware' => 'auth',
]);
Route::post('article/update',[
    'as' =>'update_article_path',
    'uses' =>'ArticleController@update',
    'middleware' => 'auth',
]);
//Categorie road


Route::get('categories',[
    'as' =>'categorie_path',
    'uses' =>'CategorieController@index',
    'middleware' => 'auth',
]);
Route::get('categorie',[
    'as' =>'categorie_add_path',
    'uses' =>'CategorieController@create',
    'middleware' => 'auth',
]);
Route::post('categorie',[
    'as' =>'categorie_add_path',
    'uses' =>'CategorieController@store',
    'middleware' => 'auth',
]);


