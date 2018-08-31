<?php

use App\Animal;

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



Auth::routes();

Route::get('/', 'AnimalController@index')->name('home');

Route::get('/szukaj', [
	'uses' => 'SearchController@index',
	'as' => 'search'
]);

Route::get('/zaginione/', 'AnimalController@zaginione')->name('zaginione');
Route::get('/psygarniete/', 'AnimalController@psygarniete')->name('psygarniete');

Route::get('/aktualnosci/', 'PageController@shownews')->name('pagenews');

Route::group(['middleware' => 'checkifadmin'], function () {
	Route::get('/strona/edytuj/{page}', 'PageController@edit')->name('pageedit');
	Route::patch('/strona/edytuj/{page}', 'PageController@update');
	Route::get('/strona/dodaj/', 'PageController@create')->name('pagecreate');
	Route::put('/strona/dodaj/', 'PageController@store');
	Route::delete('/strona/usun/{page}', 'PageController@destroy')->name('pagedestroy');

	Route::get('/zwierzak/dodaj', 'AnimalController@create')->name('animalcreate');
	Route::put('/zwierzak/dodaj', 'AnimalController@store');
	Route::get('/zwierzak/edytuj/{animal}', 'AnimalController@edit')->name('animaledit');
	Route::patch('/zwierzak/edytuj/{animal}', 'AnimalController@update');
	Route::delete('/zwierzak/usun/{animal}', 'AnimalController@destroy')->name('animaldestroy');

	Route::get('/zwierzak/weryfikacja/{animal}', 'AnimalController@verify')->name('animalverify');

	Route::get('/admin', 'AdminController@index')->name('admin.index');

	Route::get('/admin/zwierzaki', 'AnimalController@animalsIndex')->name('admin.animals');
	Route::get('/admin/strony', 'PageController@pagesIndex')->name('admin.pages');
	Route::get('/admin/uzytkownicy', 'UserController@Index')->name('admin.users');

	Route::get('/admin/uzytkownicy/dodaj', 'UserController@create')->name('usercreate');
	Route::put('/admin/uzytkownicy/dodaj', 'UserController@store')->name('userstore');;


});

Route::get('/zwierzak/{animal}', 'AnimalController@show')->name('animal');

Route::get('/{page}', 'PageController@show')->name('pageshow');
