<?php

use App\Http\Controllers\furnitureController;
use App\Models\furniture;
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


Route::get('/furniture',[FurnitureController::class, 'index'])->name('welcome');
Route::get('/furniture/create',[FurnitureController::class, 'create'])->name('furniture.create');
Route::post('/furniture',[FurnitureController::class, 'store'])->name('furniture.store');
Route::get('/furniture/show/{id}',[FurnitureController::class, 'show'])->name('furniture.view');
Route::get('/furniture/edit/{id}',[FurnitureController::class, 'edit'])->name('furniture.edit');
Route::put('/furniture/update/{furnitureId}',[FurnitureController::class, 'update'])->name('furniture');
Route::delete('/furniture/{id}',[furnitureController::class, 'destroy'])->name('furniture.destroy');
