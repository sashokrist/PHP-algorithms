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
    return view('welcome');
});

Route::get('algorithm-arrays-sort', 'TrainingController@algorithm');
Route::get('algorithm-arrays-search', 'TrainingController@linearSearch');
Route::get('algorithm-search', 'TrainingController@searchView');
Route::post('algorithm-search-result', 'TrainingController@result')->name('search-result');
Route::get('algorithm-search-binary', 'TrainingController@binary');
Route::get('algorithm-search-binaryRec', 'TrainingController@binarySearchRecResult');
Route::get('observer', 'TrainingController@observer');
Route::get('observer/cheese', 'TrainingController@cheese');
Route::get('observer/car', 'CarController@car');
Route::get('singleton', 'CarController@singleton');
Route::get('iterator', 'CarController@iterator');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
