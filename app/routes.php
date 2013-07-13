<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/




Route::controller('auth', 'AuthController');

Route::controller('list', 'CatalogController');


Route::controller('profile/announcement', 'Profile_AnnouncementController');
Route::controller('profile/message',      'Profile_MessageController');
Route::controller('profile/estate',       'Profile_EstateController');
Route::controller('profile',              'Profile_BaseController');


Route::controller('/', 'HomeController');