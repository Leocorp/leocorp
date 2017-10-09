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

Route::get('/','HomeController@index');
Route::post('comments', 'CommentsController@store');
Route::post('subscribe', 'SubscriptionsController@store');
Route::get('gallery','GalleryController@index');
Route::get('virtual_tour','VirtualTourController@home');

Route::get('applications','ApplicationsController@home');

Route::group(['middleware' => 'admin'], function(){
	Route::get('ctrlpanel','AdministrationController@ControlPanel');
	
	Route::get('gallery/{image}/edit','GalleryController@edit');
	Route::patch('gallery/{id}','GalleryController@update');
	Route::get('gallery/{image}/delete', 'GalleryController@fetch');
	Route::delete('gallery/{id}', 'GalleryController@destroy');
	Route::post('gallery/upload','GalleryController@upload');
	Route::get('gallery/view','GalleryController@viewall');
	
	Route::get('virtual_tour/{vtour}/edit','VirtualTourController@edit');
	Route::patch('virtual_tour/{id}','VirtualTourController@update');
	Route::get('virtual_tour/{vtour}/delete', 'VirtualTourController@fetch');
	Route::delete('virtual_tour/{id}', 'VirtualTourController@destroy');
	Route::get('virtual_tour/prep','VirtualTourController@prep');
	Route::post('virtual_tour/upload','VirtualTourController@upload');
	Route::get('virtual_tour/view','VirtualTourController@viewall');
	
	Route::get('category', 'CategoryController@index');
	Route::patch('category/{id}', 'CategoryController@manage');
	Route::post('category/new', 'CategoryController@addnew');
	
	Route::get('user', 'UserController@index');
	Route::patch('user/{id}', 'UserController@manage');
	Route::post('user/new', 'UserController@addnew');
	
	Route::get('projects/view','ProjectsController@viewall');
	Route::post('projects/new','ProjectsController@addnew');
	Route::get('projects/{project}/edit','ProjectsController@edit');
	Route::patch('projects/{id}','ProjectsController@update');
	Route::get('projects/{project}/delete', 'ProjectsController@fetch');
	Route::delete('projects/{id}', 'ProjectsController@destroy');
	
	Route::post('apps/new','ApplicationsController@addnew');
	Route::get('apps/view','ApplicationsController@viewall');
	Route::get('apps/{application}/edit','ApplicationsController@edit');
	Route::patch('apps/{id}','ApplicationsController@update');
	Route::delete('apps/{id}','ApplicationsController@destroy');
	
	Route::get('comments/view', 'CommentsController@home');
});

Route::get('projects','ProjectsController@home');
Route::get('projects/{proj}','ProjectsController@project');

Route::get('apps','ApplicationsController@home');
Route::get('apps/download/{application}', 'ApplicationsController@download');

Auth::routes();


