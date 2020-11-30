<?php

use App\Http\Controllers\SemiOrderController;
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

Route::get('/', [SemiOrderController::class, 'index']);
Route::get('/create', [SemiOrderController::class, 'create']);
Route::get('/make', [SemiOrderController::class, 'make']);