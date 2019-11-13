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

use Yajra\DataTables\DataTables;


Route::get('/', function () {
    return view('welcome');
});


Route::get('add','CarController@create');
Route::post('add','CarController@store');
Route::get('car','CarController@index');
Route::get('edit/{id}','CarController@edit');
Route::post('edit/{id}','CarController@update');
Route::delete('{id}','CarController@destroy');


//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('welcome');
    });


    Route::get('home', 'HomeController@index');
    Route::get('admin', 'HomeController@index');
    Route::get('admin/dashboard', 'HomeController@index');

    // Activity
    Route::get('admin/activity/add','ActivityController@create')->name('addactivity');
    Route::post('admin/activity/add','ActivityController@store');
    Route::get('admin/activity', 'ActivityController@index')->name('activity');
    Route::get('admin/activity/edit/{id}','ActivityController@edit');
    Route::post('admin/activity/edit/{id}','ActivityController@update');
    Route::delete('admin/activity/delete/{id}','ActivityController@destroy');
    Route::get('admin/activity/serverSide', [
        'as'   => 'activityserverSide',
        'uses' => function () {
            $activities = App\Activity::all();
            return Datatables::of($activities)
                ->addColumn('action', function ($activity) {
                    return '<a href="/admin/activity/edit/'.$activity->id.'" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                })->make(true);
        }
    ]);

    // Symptoms
    Route::get('admin/symptom', 'SymptomController@index')->name('symptom');
    Route::get('admin/symptom/edit/{id}','SymptomController@edit');
    Route::post('admin/symptom/edit/{id}','SymptomController@update');
    Route::delete('admin/symptom/delete/{id}','SymptomController@destroy');
/*    Route::get('admin/symptom/add','SymptomController@create')->name('addsymptom');
    Route::post('admin/symptom/add','SymptomController@store');
    */
    Route::get('admin/symptom/serverSide', [
        'as'   => 'serverSide',
        'uses' => function () {
            $symptoms = App\Symptom::all();
            return Datatables::of($symptoms)
                ->addColumn('action', function ($symptom) {
                return '<a href="/admin/symptom/edit/'.$symptom->id.'" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })->make(true);
        }
    ]);
});




