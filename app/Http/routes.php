<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::auth();

Route::group(['middleware' => ['auth']], function() {
Route::get('/home', 'HomeController@index');
Route::get('/admin', 'HomeController@index');
Route::get('/customers', 'HomeController@user');

});
// admin routes;
Route::group(['middleware' => ['auth','role:admin']], function() {

Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index']);
Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create']);
Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store']);
Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit']);
Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update']);
Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy']);
});
//  routes;
Route::group(['middleware' => ['auth','role:user']], function() {
Route::get('itemCRUD2',['as'=>'itemCRUD2.index','uses'=>'ItemCRUD2Controller@index']);
Route::get('itemCRUD2/create',['as'=>'itemCRUD2.create','uses'=>'ItemCRUD2Controller@create']);
Route::post('itemCRUD2/create',['as'=>'itemCRUD2.store','uses'=>'ItemCRUD2Controller@store']);
Route::get('itemCRUD2/{id}',['as'=>'itemCRUD2.show','uses'=>'ItemCRUD2Controller@show']);
Route::get('itemCRUD2/{id}/edit',['as'=>'itemCRUD2.edit','uses'=>'ItemCRUD2Controller@edit']);
Route::patch('itemCRUD2/{id}',['as'=>'itemCRUD2.update','uses'=>'ItemCRUD2Controller@update']);
Route::delete('itemCRUD2/{id}',['as'=>'itemCRUD2.destroy','uses'=>'ItemCRUD2Controller@destroy']);

});
// Manager routes;
Route::group(['middleware' => ['auth','role:manager|admin']], function() {
Route::resource('users','UserController');
});
// User routes;
Route::group(['middleware' => ['auth','role:user']], function() {

  });
