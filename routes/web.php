<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZoneController;
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
    return view('pages.update');
});

// Route::get('/result', function () {
//     return view('pages.result');
// }); 
// Route::get('/user', [ZoneController::class, 'store']);
// Route::get('/show', [ZoneController::class, 'index']);

// Route::resource('zones', ZoneController::class);