<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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
    return view('my-first');
});

Route::get('/form', function () {
    return view('my-form');
});
Route::post('/saveMyTest', [Controller::class,'saveMyTest']);

Route::get('/user', [Controller::class, 'getName']);

Route::get('/get-distance/{lat1}/{lon1}/{lat2}/{lon2}/{unit}', [Controller::class, 'getDistance']);

Route::get('/get-users', [Controller::class, 'getUsers']);
Route::get('/export-csv', [Controller::class,'exportCSV']);