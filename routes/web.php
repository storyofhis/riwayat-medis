<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RekamMedisController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::get('/rekam-medis', function () {
//     return view('rekam-medis');
// })->middleware(['auth'])->name('rekam-medis');
Route::get('/rekam-medis', [RekamMedisController::class, 'input'])->middleware(['auth'])->name('rekam-medis');
Route::post('/process-screening', [RekamMedisController::class, 'process']);

require __DIR__.'/auth.php';
