<?php

use App\Http\Controllers\FilteringController;
use Illuminate\Support\Facades\Route;

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



Route::get('/', [FilteringController::class, 'index']);
Route::get('/result', function () {
    return view('result');
});
Route::get('/akurasi', [FilteringController::class, 'indexAkurasi']);
Route::post('/analyze', [FilteringController::class, 'analyze']);
