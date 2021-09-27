<?php

use App\Http\Controllers\ShortLinkController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('/shortlinks', [ShortLinkController::class,'index']);
Route::post('/shortlinks/generate-shortener-link', [ShortLinkController::class,'GenerateLink']);
Route::get('/shortlinks/{code}', [ShortLinkController::class,'ShortenLink'])->name('shorten.link');*/

Route::get('/', [ShortLinkController::class,'index']);
Route::post('/generate-shortener-link', [ShortLinkController::class,'GenerateLink']);
Route::get('/{code}', [ShortLinkController::class,'ShortenLink'])->name('shorten.link');
