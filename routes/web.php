<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', [ProductController::class, 'index']);
Route::get('/create', [ProductController::class, 'create']);
Route::get('/read', [ProductController::class, 'read']);
Route::post('/store', [ProductController::class, 'store']);
Route::get('/edit/{id}', [ProductController::class, 'edit']);
Route::put('/update/{id}', [ProductController::class, 'update']);
Route::delete('/destroy/{id}', [ProductController::class, 'destroy']);
