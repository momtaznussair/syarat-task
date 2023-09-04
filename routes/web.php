<?php

use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;
use App\Livewire\Departments\DepartmentList;
use App\Livewire\Departments\CreateDepartment;
use App\Http\Controllers\Auth\LogoutController;

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



Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome'); // Example default route
    })->name('home');
    
    // Department Routes
    Route::prefix('departments')->name('departments.')->group(function () {
        Route::get('/', DepartmentList::class)->name('list');
        Route::get('create', CreateDepartment::class)->name('create');
    });

    //logout
    Route::post('/logout', LogoutController::class)->name('logout');

});

//Auth
Route::middleware(['guest'])->prefix('auth')->group(function () {
    Route::get('login', Login::class)->name('login');
});
