<?php
use App\Http\Controllers\PersonnageController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\SpecialisationController;
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

// Route Page d'accueil :
Route::get('/', function () {
    return redirect()->route('personnage.index');
});

// Routes du Controller Personnage :
Route::resource('/personnage', PersonnageController::class);
Route::get('/tri_par_classe',[PersonnageController::class, 'tpc'])->name('personnage.tpc');
Route::get('/tri_par_specialisation',[PersonnageController::class, 'tps'])->name('personnage.tps');

// Routes du Controller Classe :
Route::resource('/classe', ClasseController::class);

// Routes du Controller Spécialisation :
Route::resource('/specialisation', SpecialisationController::class);
Route::get('/selecteur/specialisation', [SpecialisationController::class, 'changeSelecteur']);
