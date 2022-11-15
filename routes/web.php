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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
Route::resource('/', App\Http\Controllers\Admin\DashboardController::class);
Route::resource('guest', App\Http\Controllers\Admin\GuestController::class);
Route::resource('confirmation-letter', App\Http\Controllers\Admin\ConfirmationLetterController::class);
Route::resource('villa', App\Http\Controllers\Admin\VillaController::class);
Route::resource('setting', App\Http\Controllers\Admin\SettingController::class);

Route::get('/email', function () {
    return view('email.confirmation-letter');
});
});