<?php

use GuzzleHttp\Middleware;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('programas', App\Http\Controllers\ProgramaController::class)->Middleware('auth');
Route::resource('servicios', App\Http\Controllers\ServicioController::class)->Middleware('auth');
Route::resource('becados', App\Http\Controllers\BecadoController::class)->Middleware('auth');
Route::resource('gastos', App\Http\Controllers\GastoController::class)->Middleware('auth');
Route::resource('documentos', App\Http\Controllers\DocumentosController::class)->Middleware('auth');
Route::resource('reportes', App\Http\Controllers\ReporteController::class)->Middleware('auth');
Route::resource('detallegastos', App\Http\Controllers\DetallegastoController::class)->Middleware('auth');

Route::get('/reportess/{id}', [App\Http\Controllers\ReporteController::class, 'servicio'])->name('servicio');
Route::get('/programa/{id}', [App\Http\Controllers\ReporteController::class, 'programa'])->name('programa');
Route::get('/programaf/{id}', [App\Http\Controllers\ReporteController::class, 'programaf'])->name('programaf');
Route::get('/programafano/{id}', [App\Http\Controllers\ReporteController::class, 'programafano'])->name('programafano');
Route::get('/estatus/{id}', [App\Http\Controllers\ReporteController::class, 'estatus'])->name('estatus');
Route::get('/perfil/{id}', [App\Http\Controllers\ReporteController::class, 'perfil'])->name('perfil');
Route::post('/graduados', [App\Http\Controllers\ReporteController::class, 'graduados'])->name('graduados');
Route::post('/graduadosf', [App\Http\Controllers\ReporteController::class, 'graduadosf'])->name('graduadosf');
Route::post('/anoiniciobeca', [App\Http\Controllers\ReporteController::class, 'anoiniciobeca'])->name('anoiniciobeca');
Route::post('/gastosporano', [App\Http\Controllers\ReporteController::class, 'gastosporano'])->name('gastosporano');
Route::post('/gastoprograma', [App\Http\Controllers\ReporteController::class, 'gastoprograma'])->name('gastoprograma');


Route::get('/fechan', [App\Http\Controllers\ReporteController::class, 'fechan'])->name('fechan');
Route::get('/search', [App\Http\Controllers\GastoController::class, 'search'])->name('search');
Route::get('/searche', [App\Http\Controllers\GastoController::class, 'searche'])->name('searche');
Route::post('/stores', [App\Http\Controllers\DocumentosController::class, 'stores'])->name('stores');
Route::get('/eliminar/{id}', [App\Http\Controllers\DetallegastoController::class, 'destroy'])->name('eliminar');
