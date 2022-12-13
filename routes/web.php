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

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/viewFile');
    }
    else {
        return view('auth.login');
    }
});

Auth::routes();


Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', 'WebsiteListController@viewFile')->name('home');
    Route::post('/fileList/uploadFile', 'WebsiteListController@uploadFile')->name('uploadFile');
    Route::get('/myFile', 'WebsiteListController@myFile')->name('myFile');
    Route::get('/viewFile', 'WebsiteListController@viewFile')->name('viewFile');
    Route::get('/viewFile/EditWeb/{id}', 'WebsiteListController@EditWeb')->name('EditWeb');
    Route::post('/viewFile/EditWeb/updateWebsite', 'WebsiteListController@updateWebsite')->name('updateWebsite');
    Route::get('/viewFile/deleteWeb/{id}', 'WebsiteListController@deleteWeb')->name('deleteWeb');
});



