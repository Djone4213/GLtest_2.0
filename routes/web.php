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

Route::get(
  '/u/{UserLogin}',
  'PasteController@getUserPaste',
)->name('user-pastes');

Route::get(
  '/p/register',
  'RegisterController@create'
)->name('register');

Route::post(
  '/p/register',
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

Route::post(
  '/p/new',
  'PasteController@store'
)->name('paste-new');

Route::get(
  '/p/{cacheString}',
  'PasteController@showPasteOne'
)->name('paste-one');

// Route::get(
//   'user/paste/{cacheString}',
//   'PasteController@showUserPaste'
// )->name('user-paste-one');

Route::get(
  '/p/update/{cacheString}',
  'PasteController@updatePasteView',
)->name('paste-update');

Route::post(
  '/p/update/{cacheString}',
  'PasteController@updatePaste',
)->name('paste-update-submit');

Route::get(
  '/p/delete/{cacheString}',
  'PasteController@deletePaste',
)->name('paste-delete');

Route::get(
  '/u/{UserLogin}',
  'PasteController@getUserPaste',
)->name('user-pastes');
