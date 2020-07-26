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


// Route::get('/hello', function () {
//     return '<h1>HELLO WORD</h1>';
// });
// Route::get('/about', function () {
//     return view('pages/about');
// });
// Route::get('/users/{id}', function ($id) {
//     return $id;
// });
// Route::get('/', 'PagesController@index');
Route::get('/', function () {
    return view('home');
});
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::resource('/post', 'PostController');
Route::get('tasks', 'TodoController@index')->name('tasks');
Route::middleware(['todocheck'])->group(function () {
    Route::get('todo/gettasks', 'TodoController@gettasks');
    Route::post('todo/save', 'TodoController@save');
    Route::get('todo/edit/{post}', 'TodoController@edit');
    Route::post('todo/update', 'TodoController@update');
    Route::get('todo/destroy/{post}', 'TodoController@destroy');

 
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});


