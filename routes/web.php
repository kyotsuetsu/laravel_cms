<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatchingController;
use App\Http\Controllers\PhotoController;
use App\Models\User;
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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/matching', function () {
    $users = User::all();
    return view('/matching',['users'=>$users]);
})->middleware(['auth', 'verified'])->name('matching');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::resource('/photos', 'App\Http\Controllers\PhotoController')->only(['create','store']);

Route::get('/photos/create', [PhotoController::class, 'uploadForm'])->name('photos.create.form');

Route::post('/photos/create', [PhotoController::class, 'upload'])->name('photos.create');






require __DIR__.'/auth.php';
