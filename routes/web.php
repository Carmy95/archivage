<?php



use App\Http\Controllers\DepartementController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\StatuController;
use App\Http\Controllers\TypeController;

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

// Route::get('/', function () {
//     return view('acceuil');
// });

Route::get('/dashboard', [homeController::class,'dashboard'])->name('dashboard');
Route::resource('departements', DepartementController::class);
Route::resource('services', ServiceController::class);
Route::resource('documents', DocumentController::class);
Route::resource('status', StatuController::class);
Route::resource('types', TypeController::class);


Route::get('/', [homeController::class,'index'])->name('home');
Route::get('/archives',[homeController::class, 'create'])->name('clients.create');
Route::post('/archives',[DocumentController::class, 'clientstore'])->name('clients.store');
Route::get('/docservices',[homeController::class, 'services'])->name('clients.service');
Route::get('/docshow/{id} ',[homeController::class, 'show'])->name('clients.show');
Route::get('/departeshow/{id} ',[homeController::class, 'departshow'])->name('clients.departe.show');
Route::get('/docdepartements',[homeController::class, 'departement'])->name('clients.departement');
//telechargement du document
Route::get('/download/{id} ',[DocumentController::class, 'download'])->name('download');

// Route::get('/',[homeController::class, ''])->name('clients.form');
// Route::get('/',[homeController::class, ''])->name('clients.form');
// Route::get('/',[homeController::class, ''])->name('clients.form');
