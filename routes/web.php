<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/api', function () {
    $response = Http::get('https://api.openweathermap.org/data/2.5/weather?lat=25.77&lon=-80.21&appid=726e52009a6de7013e4b8f470cc4f4c5');
    $data = $response->json();
    $humidity = $data['main'];
    $humiditi = $humidity['humidity'];
    
    return $humiditi;
    
});

Route::get('/', [ApiController::class,'index']);
Route::match(['get', 'post'],'/view-map', '\App\Http\Controllers\ApiController@viewMap')->name('view-map');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
