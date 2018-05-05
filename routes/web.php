<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/logout','Auth\LoginController@logoutUser')->name('user.logout');

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
    Route::get('/logout','AuthAdmin\LoginController@logout')->name('admin.logout');
});

Route::get('/user2',function(){
    return view('user.user2');
})->middleware(['role2','auth']);

Route::get('/home', function(){
return view('user.user1');
})->middleware(['role1','auth']);

Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
