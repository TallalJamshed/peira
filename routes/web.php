<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});
// ---------------------------------// BACKEND // ---------------------------------//
Route::get('/dash' , 'BackendControllers\DashboardController@index')->name('dashboard');
Route::get('/school/new' , 'BackendControllers\SchoolController@showNewSchools')->name('shownewschools');
Route::get('/school/edit/{id}' , 'BackendControllers\SchoolController@editSchools')->name('editschool');

Route::post('/getschools' , 'BackendControllers\SchoolController@getSchools')->name('getschools');


Auth::routes(['register'=>true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

ROute::get('/map', 'BackendControllers\MapsController@index')->name('showmap');

// ---------------------------------// FRONTEND // ---------------------------------//
Route::get('/registrationform','FrontendControllers\RegistrationController@index')->name('registrationform');
Route::post('/registration/save','FrontendControllers\RegistrationController@saveRegForm')->name('saveregform');
Route::get('/registration/genpdf/{id}','FrontendControllers\RegistrationController@generatePdf')->name('genpdf');

