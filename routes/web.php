<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\PointsController::class, 'index']); 
Route::post('/create-point', [App\Http\Controllers\PointsController::class, 'store'])->name('points.store'); 
Route::delete('/delete-point/{id}', [App\Http\Controllers\PointsController::class, 'destroy'])->name('points.destroy'); 
Route::get('/buscar-dados', function () { $points = App\Models\Point::all(); return response()->json($points);});


