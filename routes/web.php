<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


//Route Admin
Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'AuthAdmin\LoginController@Adminlogout')->name('admin.logout');
    Route::post('/logout', 'AuthAdmin\LoginController@Adminlogout')->name('admin.logout');

    Route::get('/password/reset','AuthAdmin\ForgotPasswordController@ShowLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email','AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    
    Route::get('/password/reset/{token}','AuthAdmin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset','AuthAdmin\ResetPasswordController@reset');
});

//Route User1
Route::prefix('home')->group(function() {
    Route::get('/', function(){
    return view('user.user1');
    })->middleware(['role1','auth']);
    Route::get('/logout', 'Auth\LoginController@userLogout')->name('home.logout');
    Route::post('/logout', 'Auth\LoginController@userLogout')->name('home.logout');
    });

//Route User2
Route::prefix('user2')->group(function(){
    Route::get('/',function(){
        return view('user.user2');
    })->middleware(['role2','auth']);
    
Route::get('/logout', 'Auth\LoginController@userLogout')->name('user2.logout');
Route::post('/logout', 'Auth\LoginController@userLogout')->name('user2.logout');

});



Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
