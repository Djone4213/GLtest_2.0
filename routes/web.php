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

Route::get(
  '/',
  'PasteController@create'
)->name('home');

Route::post(
  '/paste/new',
  'PasteController@store'
)->name('paste-new');

Route::get(
  '/paste/{cacheString}',
  'PasteController@showPasteOne'
)->name('paste-one');

Route::get(
  '/paste/update/{id}',
  'PasteController@updatePasteView',
)->name('paste-update');

Route::post(
  '/paste/update/{id}',
  'PasteController@updatePaste',
)->name('paste-update-submit');

Route::get(
  '/paste/delete/{id}',
  'PasteController@deletePaste',
)->name('paste-delete');

Route::get(
  '/register',
  'RegisterController@create'
)->name('register');

Route::post(
  '/register',
  'RegisterController@store'
)->name('user-register');


Route::get(
  '/login',
  'SessionController@create'
)->name('login');

Route::post(
  '/login',
  'SessionController@store'
)->name('user-login');

Route::get(
  '/logout',
  'SessionController@destroy'
)->name('logout');

Route::get(
  '/social-auth/{provider}',
  'SocialController@redirectToProvider'
)->name('auth.social');

Route::get(
  '/social-auth/{provider}/callback',
  'SocialController@handleProviderCallback'
)->name('auth.social.callback');
