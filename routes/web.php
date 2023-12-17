<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KycControllers\RecordsController;
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

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});*/

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [RecordsController::class, 'showRecords'])->name('records.dashboard');
    Route::get('/edit_records', function () {
        return view('kyc.editRecords');
    })->name('edit_records.form');
    Route::post('edit_records', [RecordsController::class, 'editRecords'])->name('edit.records');
    // Route for deleting a task
    Route::post('delete_record/{id}', [RecordsController::class, 'deleteRecord'])->name('delete.records');
});

require __DIR__.'/auth.php';


