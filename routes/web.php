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



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware('auth');

Auth::routes();
Route::resource('naspas','NaspasController');
Route::get('/pretraga','NaspasController@pretraga');
Route::fallback('AnimalController@dashboard')->middleware('auth');
Route::get('profil','AnimalController@dashboard')->middleware('auth');
Route::get('home','AnimalController@dashboard')->middleware('auth');
Route::get('dashboard','AnimalController@dashboard')->middleware('auth');
Route::get('adopted','AnimalController@adopted')->middleware('auth');
Route::resource('users','UserController')->middleware('auth');
Route::get('/','AnimalController@dashboard')->middleware('auth');
Route::resource('locations','LocationsController')->middleware('auth');
Route::resource('reasons','ReasonController')->middleware('auth');
Route::resource('statuses','StatusController')->middleware('auth');
Route::resource('catch','CatchController')->middleware('auth');
Route::resource('sorts','SortController')->middleware('auth');
Route::post('animals/search', 'AnimalController@search')->name('animals.search');
Route::resource('animals','AnimalController')->middleware('auth');
Route::resource('nacin','NacinController')->middleware('auth');
Route::get('udomljen','AnimalController@udomljen')->middleware('auth');
Route::resource('box','BoxController')->middleware('auth');
Route::resource('reports','ReportController')->middleware('auth');
Route::post('animals/report/pdf', 'ReportController@exportPDF')->name('report.pdf');
Route::post('animals/report/search', 'ReportController@search')->name('report.search');
Route::get('animals/{id}/pdf', ['uses' =>'AnimalController@exportPDF'])->name('animals.pdf');



// Route::get('/locations/create', function () {
//     return view('mesta/create');
// });
