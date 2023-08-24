<?php

use App\Http\Controllers\FurnitureController;
use App\Models\Furniture;
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


Route::get('/',[FurnitureController::class, 'index'])->name('furniture.index');
Route::get('/furniture/create',[FurnitureController::class, 'create'])->name('furniture.create');
Route::put('/furniture',[FurnitureController::class, 'store'])->name('furniture.store');
Route::get('/furniture/{id}/show',[FurnitureController::class, 'show'])->name('furniture.show');
Route::get('/furniture/{id}/edit', [FurnitureController::class, 'edit'])->name('furniture.edit');

Route::put('/furniture/{id}/update',[FurnitureController::class, 'update'])->name('furniture.update');
Route::delete('/furniture/{id}',[FurnitureController::class, 'destroy'])->name('furniture.destroy');
