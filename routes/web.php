<?php



use App\Http\Controllers\DepartementController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatuController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/confirme', function () {
    return view('auth.first');
});

Route::get('/dashboard', [homeController::class,'dashboard'])->name('dashboard')->middleware('admin');
Route::resource('services', ServiceController::class)->middleware('admin');
Route::resource('documents', DocumentController::class)->middleware('admin');
Route::resource('status', StatuController::class)->middleware('admin');
Route::resource('types', TypeController::class)->middleware('admin');
Route::resource('roles', RoleController::class)->middleware('admin');
Route::resource('personnes', PersonneController::class);


Route::get('/deconnecter', [homeController::class,'deconnecter'])->name('deconnecter');
Route::get('/', [homeController::class,'index'])->name('home')->middleware('client');
Route::get('/archives',[homeController::class, 'create'])->name('clients.create')->middleware('client');
Route::post('/archives',[DocumentController::class, 'clientstore'])->name('clients.store')->middleware('client');
Route::get('/docservices',[homeController::class, 'services'])->name('clients.service')->middleware('client');
Route::get('/docshow/{id} ',[homeController::class, 'show'])->name('clients.show')->middleware('client');
Route::get('/departeshow/{id} ',[homeController::class, 'departshow'])->name('clients.departe.show')->middleware('client');
Route::get('/docdepartements',[homeController::class, 'departement'])->name('clients.departement')->middleware('client');
//telechargement du document
Route::get('/download/{id} ',[DocumentController::class, 'download'])->name('download');

Route::get('/errors404',[homeController::class, 'client_404'])->name('clients.404');
Route::get('/erros',[homeController::class, 'admin_404'])->name('admin.404');
Route::get('/first',[PersonneController::class, 'first'])->name('first');
Route::get('/profil/{id}',[homeController::class, 'profil'])->name('clients.profil')->middleware('client');
Route::get('/editprofil/{id}',[homeController::class, 'edit'])->name('clients.edit_profil')->middleware('client');
Route::post('/first/{id}',[PersonneController::class, 'firstStore'])->name('first.update');
Route::post('/profil/{id}',[PersonneController::class, 'profil_update'])->name('clients.update_profil')->middleware('client');

Route::post('/recherche',[homeController::class, 'recherche'])->name('recherche');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
