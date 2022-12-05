<?php
// Routes
use Illuminate\Support\Facades\Route;
// Controllers
use App\Http\Controllers\AgenceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\QuittanceController;
use App\Http\Controllers\CompteurController;
// Models
use App\Models\Agence;
use App\Models\Client;


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
// Route home page
Route::get('/', function () {
    $data = Agence::first();
    $client = Client::first();
    return view('client', compact('data'), compact('client'));
})->name('index');

// Route for agency
Route::resource('enregistrer', AgenceController::class);
// Route for client
Route::resource('client', ClientController::class);
Route::get('client-delete/{id}', [FactureController::class , 'destroy'])->name('client-delete');
// Route for facture
Route::post('facture/{id}', [FactureController::class, 'store'])->name('facture');
Route::get('list-facture/{id}', [FactureController::class, 'show'])->name('list-facture');
Route::get('delete-facture/{id}/{id2}', [FactureController::class, 'delete'])->name('delete-facture');

// Route quittance
Route::get('quittance/{id}/{id2}', [QuittanceController::class, 'index'])->name('quittance');
Route::post('quittance/{id}/{id2}', [QuittanceController::class, 'store'])->name('quittance-enregistrement');
Route::get('list-quittance/{id}/{id2}', [QuittanceController::class, 'show'])->name('list-quittance');
Route::get('delete-quittance/{id}/{id2}/{id3}', [QuittanceController::class, 'delete'])->name('delete-quittance');

// Route Compteur
Route::post('compteur/{id}', [CompteurController::class, 'store'])->name('compteur');
Route::get('list-compteur/{id}', [CompteurController::class, 'show'])->name('list-compteur');
Route::get('delete-compteur/{id}/{id2}', [CompteurController::class, 'delete'])->name('delete-compteur');
