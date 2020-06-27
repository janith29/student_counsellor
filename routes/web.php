<?php
namespace App\Http\Middleware;
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
    return view('welcome');
})->name('/');
Route::get('/login', function () {
    return view('login');
});

Route::group(['namespace' => 'Auth'], function () {

    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'administrator'], function () {
  
    // Dashboard
    Route::get('/', 'DashboardController@index')->name('admin');

    //User
    Route::get('user', 'UserController@index')->name('user');
    Route::get('user/show/{user}', 'UserController@show')->name('user.show');
    Route::post('user/post', 'UserController@store')->name('user.add');;
    Route::post('user/update', 'UserController@update')->name('user.update');
    Route::post('user/delete', 'UserController@delete')->name('user.delete');


    // reports
    Route::get('reports', 'ReportsController@index')->name('reports');
    Route::post('reports/dates', 'ReportsController@dates')->name('reports.dates');
    Route::post('reports/age', 'ReportsController@age')->name('reports.age');
    Route::post('reports/university', 'ReportsController@university')->name('reports.university');
    Route::post('reports/course', 'ReportsController@course')->name('reports.course');
    Route::post('reports/apply', 'ReportsController@apply')->name('reports.apply');
    Route::post('reports/offer', 'ReportsController@offer')->name('reports.offer');
    Route::post('reports/summary', 'ReportsController@summary')->name('reports.summary');

    
});
Route::group(['prefix' => 'councillor', 'as' => 'councillor.', 'namespace' => 'Councillor', 'middleware' => 'councillor'], function () {
  
    // Dashboard
    Route::get('/', 'DashboardController@index')->name('councillor');
    Route::get('markAsread','DashboardController@markread');

    // inquiry
    Route::get('inquiry', 'InquiryController@index')->name('inquiry');
    Route::get('inquiry/show/{inquiry}', 'InquiryController@show')->name('inquiry.show');
    Route::post('inquiry/post', 'InquiryController@store')->name('inquiry.add');;
    Route::post('inquiry/update', 'InquiryController@update')->name('inquiry.update');
    Route::post('inquiry/delete', 'InquiryController@delete')->name('inquiry.delete');

    // apply
    Route::get('apply', 'ApplyController@index')->name('apply');
    Route::get('apply/show/{apply}', 'ApplyController@show')->name('apply.show');
    Route::post('apply/post', 'ApplyController@store')->name('apply.add');
    Route::post('apply/update', 'ApplyController@update')->name('apply.update');

    // offer
    Route::get('offer', 'OfferController@index')->name('offer');
    Route::get('offer/show/{offer}', 'OfferController@show')->name('offer.show');
    Route::post('offer/post', 'OfferController@store')->name('offer.add');
    Route::post('offer/update', 'OfferController@update')->name('offer.update');
    
    // reports
    Route::get('reports', 'ReportsController@index')->name('reports');
    Route::post('reports/dates', 'ReportsController@dates')->name('reports.dates');
    Route::post('reports/age', 'ReportsController@age')->name('reports.age');
    Route::post('reports/university', 'ReportsController@university')->name('reports.university');
    Route::post('reports/course', 'ReportsController@course')->name('reports.course');
    Route::post('reports/apply', 'ReportsController@apply')->name('reports.apply');
    Route::post('reports/offer', 'ReportsController@offer')->name('reports.offer');
    Route::post('reports/summary', 'ReportsController@summary')->name('reports.summary');
});