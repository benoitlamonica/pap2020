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

//Showing Pages
Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('cours/{cours}', function($cours) {
    return redirect('/'.$cours.'/1');
});
Route::get('cours/{cours}/{chap}', 'CoursController@ShowSelectedCours')->name('SelectedCours');

//Administration
Route::get('/admin', 'AdminController@ShowPageController')->name('Admin')->middleware('auth.admin');
Route::get('/admin/chap', 'AdminController@ShowPageAddChapter')->name('chap')->middleware('auth.admin');
Route::get('/admin/cours', 'AdminController@ShowPageAddCours')->name('cours')->middleware('auth.admin');
Route::get('/admin/listusers', 'AdminController@ShowPageListUsers')->name('listusers')->middleware('auth.admin');
Route::post('/admin/addChap', 'AdminController@AddChapter')->name('AddChap')->middleware('auth.admin');
Route::post('/admin/addcours', 'AdminController@AddCour')->name('Addcours')->middleware('auth.admin');
Route::post('/admin/deletecours', 'AdminController@DeleteCour')->name('deletecours')->middleware('auth.admin');

//Users 
Route::post('/addmember', 'UserController@AddUser')->name('register');
Route::post('/connectmember', 'UserController@LoginUser')->name('login');
Route::get('/logout', 'UserController@LogOutUser')->name('logout');


