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

Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/login', 'Admin\LoginController@loginForm')->name('login');
    Route::get('/logout', 'Admin\LoginController@logout')->name('logout');
    Route::post('/login', 'Admin\LoginController@login')->name('login');
    Route::get('/home', 'Admin\HomeController@index')->name('home');
    Route::resource('/manager', 'Admin\ManagerController');
    Route::resource('/article', 'Admin\ArticleController');
    Route::resource('/permission', 'Admin\PermissionController');
    Route::get('/permissions/{role}', 'Admin\PermissionController@permissions')->name('permission.permissions');
    Route::resource('/role', 'Admin\RoleController');
    Route::resource('/option', 'Admin\OptionController');
    Route::delete('/role/{role}/manager/{manager}', 'Admin\RoleController@del')->name('role.del');
    Route::put('/role/{role}/permissions', 'Admin\RoleController@bundlePermissions')->name('role.permissions');
    Route::get('/role/{role}/members', 'Admin\RoleController@members')->name('role.members');
    Route::get('/manager/search', 'Admin\ManagerController@search')->name('manager.search');
    Route::resource('/site', 'Admin\SiteController');
    Route::resource('/menu', 'Admin\MenuController');
    Route::resource('/notice', 'Admin\NoticeController');
    Route::resource('/picture', 'Admin\PictureController');
    Route::resource('/product', 'Admin\ProductController');
    Route::post('/upload', 'UploadController@uploadMedia')->name('upload');
    Route::post('/upload_editor', 'UploadController@uploadEditor')->name('upload_editor');
    Route::delete('/delete_media/{media}', 'UploadController@deleteMedia')->name('delete_media');
    Route::post('/faker_upload', 'UploadController@fakerUpload')->name('faker_upload');
    Route::get('/notification/all_read', 'Admin\NotificationController@allRead')->name('all_read');

});
