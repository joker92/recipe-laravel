<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //visaulizza tutte le ricette

Route::get('/recipe',['as'=>'recipe.index','uses'=> 'ControllerRecipe@index']);   
    //visaulizza singola ricetta
    
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

Route::group(['middleware' => ['web','auth']], function () {
    //crea ricetta
Route::get('/recipe/create',['as'=>'recipe.create','uses'=> 'ControllerRecipe@create']);   

Route::post('/recipe',['as'=>'recipe.store','uses'=> 'ControllerRecipe@store']);     
    //modifica ricetta
    //questa le visualizza singola ricetta
Route::get('/recipe/{id}',['as'=>'recipe.show','uses'=> 'ControllerRecipe@show']);  
//questa prende le modifiche
Route::get('/recipe/{id}/edit',['as'=>'recipe.edit','uses'=> 'ControllerRecipe@edit']);
//rotta per laggirnamento
Route::put('/recipe/{id}',['as'=>'recipe.update','uses'=> 'ControllerRecipe@update']);  
    //cancella ricetta
Route::delete('/recipe/{id}/delete', array('as'=>'recipe.destroy','uses'=>'ControllerRecipe@destroy'));
Route::post('/recipe/search', ['as'=>'search', 'uses' =>'ControllerRecipe@search' ]);
    });