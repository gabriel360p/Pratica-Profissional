<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategorieController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/inproduction', function () {
    return view('inproduction');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::controller(ItemController::class)->group(function(){
    Route::get('/itens/create','create')->name('itens.create');
    Route::get('/itens/rent','rent')->name('itens.rent');
    Route::get('/itens/edit','edit')->name('itens.edit');
    Route::get('/itens/rented','rented')->name('itens.rented');
    Route::get('/itens/refund','refund')->name('itens.refund');
});

Route::controller(CategorieController::class)->group(function(){
    Route::get('/categories/create','create');
    Route::get('/categories','index');
    // Route::get('/itens/rent','rent')->name('itens.rent');
    // Route::get('/itens/edit','edit')->name('itens.edit');
    // Route::get('/itens/alugados','alugados')->name('itens.alugados');
    // Route::get('/itens/devolver','devolver')->name('itens.alugados');
});


require __DIR__.'/auth.php';
