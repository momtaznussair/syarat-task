<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Departments\CreateDepartment;

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

Route::get('/', function () {
    return view('welcome'); // Example default route
})->name('home');

// Department Routes
Route::prefix('departments')->name('departments.')->group(function () {
    Route::get('create', CreateDepartment::class)->name('create');
});
