<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagerController;
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

Auth::routes(['reset' => false]);

Route::group(['middleware' => ['auth', 'manager']], function () {
    Route::get('/manager', [ManagerController::class, 'index'])->name('manager');
    Route::get('/manager/check/{id}', [ManagerController::class, 'check'])->name('manager.check');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/application', [HomeController::class, 'create'])->name('application.create')->middleware('restrict');
});
