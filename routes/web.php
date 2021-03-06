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

use Illuminate\Auth\Middleware\Authenticate;

Route::get('customs/grade/{id}', 'CustomController@getPrice');
Route::post('/customs', 'CustomController@store');

Route::get('/', 'PagesController@index')->name('pages.index');
Route::get('/config', 'PagesController@config')->name('pages.config');

Route::get('/cuenta-desactivada', 'PagesController@unactive')->name('pages.unactive');
Auth::routes();




Route::group(array('prefix' => 'admin'), function(){
    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::get('/dashboard/export/excel/{buscar}/{desde}/{hasta}', 'ExcelController@getExportExcel')->name('admin.excel');
    Route::get('/dashboard/delete/{id}', 'DashboardController@delete')->name('admin.dashboard.delete');
    Route::get('/dashboard/deleteit/all', 'DashboardController@deleteAll')->name('admin.dashboard.deleteAll');

    Route::get('/grades', 'GradesAdminController@index')->name('admin.grades');
    Route::post('/grades/update', 'GradesAdminController@updateGrades');
    Route::post('/grades/update-totals', 'GradesAdminController@updateTotals');
    Route::post('/grades/update-config', 'GradesAdminController@updateConfig');
    Route::post('/grades/update-planes', 'GradesAdminController@updatePlans');

    Route::resource('/user', 'UserController');


});
