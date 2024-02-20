<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocataireController;
use App\Http\Controllers\gestionController;
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
    return view('auth.connexion');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/index', [gestionController::class, 'index']);
    Route::get('/historiques', [gestionController::class, 'historiques']);
    Route::get('/depot', [gestionController::class, 'depot']);
    Route::get('/retrait', [gestionController::class, 'retrait']);
    Route::get('/adresse', [gestionController::class, 'adresse']);
    Route::get('/saved', function () {
    return view('dashboard.form-validation');

});
Route::get('/ajoutAdresse', function () {
    return view('dashboard.adresse');
});
    Route::get('/active{id}', [gestionController::class, 'active']);
    Route::get('/rejet{id}', [gestionController::class, 'rejet']);
    Route::post('/saveAdresse', [gestionController::class, 'addAdresse']);
    Route::get('/unlock{id}', [gestionController::class, 'activeAdresse']);
    Route::post('/modif', [LocataireController::class, 'update']);
    Route::get('/delete{id}', [gestionController::class, 'destroy']);
});

Route::post('/send-message', [App\Http\Controllers\UltraMsgController::class, 'sendMessage']);

Route::get('/message-form', function () {
    return view('test.test');
});
//Route::get('waping/send', [LocataireController::class, 'send']);


require __DIR__.'/auth.php';
