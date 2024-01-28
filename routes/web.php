<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Cadastros\ClientesController;
use App\Http\Controllers\Cadastros\DestinatariosController;
use App\Http\Controllers\Manutencoes\CidadesController;
use App\Http\Controllers\Manutencoes\EstadosController;
use App\Http\Controllers\Manutencoes\UsersController;
use App\Http\Controllers\Parametros\LocalidadesController;
use App\Http\Controllers\Parametros\ParametrosController;
use App\Http\Controllers\Parametros\PesosController;
use App\Http\Controllers\Parametros\RegioesController;
use App\Http\Controllers\Parametros\TabelasController;
use App\Http\Controllers\Parametros\UnidadesController;

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

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('clientes', ClientesController::class);
    Route::get('clientes/0/list', [ClientesController::class, 'list'])->name('clientes.list');
    Route::get('clientes/0/select2', [ClientesController::class, 'select2'])->name('clientes.select2');

    Route::resource('cidades', CidadesController::class);
    Route::get('cidades/0/list', [CidadesController::class, 'list'])->name('cidades.list');
    Route::get('cidades/0/select2', [CidadesController::class, 'select2'])->name('cidades.select2');

    Route::resource('estados', EstadosController::class);
    Route::get('estados/0/list', [EstadosController::class, 'list'])->name('estados.list');
    Route::get('estados/0/select2', [EstadosController::class, 'select2'])->name('estados.select2');

    Route::resource('destinatarios', DestinatariosController::class);
    Route::get('destinatarios/0/list', [DestinatariosController::class, 'list'])->name('destinatarios.list');
    Route::get('destinatarios/0/select2', [DestinatariosController::class, 'select2'])->name('destinatarios.select2');

    Route::resource('cotacoes', ProfileController::class);
    Route::resource('fileimport', ProfileController::class);
    Route::resource('relatoriocotacao', ProfileController::class);
    Route::resource('users', ProfileController::class);

    Route::resource('localidades', LocalidadesController::class);
    Route::get('localidades/0/list', [LocalidadesController::class, 'list'])->name('localidades.list');
    Route::get('localidades/0/select2', [LocalidadesController::class, 'select2'])->name('localidades.select2');

    // Route::resource('parametros', ParametrosController::class);
    Route::get('parametros/{id?}', [ParametrosController::class, 'show'])->name('parametros.show');
    Route::get('parametros/{id?}/edit', [ParametrosController::class, 'edit'])->name('parametros.edit');
    Route::patch('parametros/{id?}/update', [ParametrosController::class, 'update'])->name('parametros.update');

    Route::resource('pesos', PesosController::class);
    Route::get('pesos/0/list', [PesosController::class, 'list'])->name('pesos.list');
    Route::get('pesos/0/select2', [PesosController::class, 'select2'])->name('pesos.select2');

    Route::resource('regioes', RegioesController::class);
    Route::get('regioes/0/list', [RegioesController::class, 'list'])->name('regioes.list');
    Route::get('regioes/0/select2', [RegioesController::class, 'select2'])->name('regioes.select2');

    Route::resource('tabelas', TabelasController::class);
    Route::get('tabelas/0/list', [TabelasController::class, 'list'])->name('tabelas.list');
    Route::get('tabelas/0/select2', [TabelasController::class, 'select2'])->name('tabelas.select2');

    Route::resource('unidades', UnidadesController::class);
    Route::get('unidades/0/list', [UnidadesController::class, 'list'])->name('unidades.list');
    Route::get('unidades/0/select2', [UnidadesController::class, 'select2'])->name('unidades.select2');

    Route::resource('parametros', ParametrosController::class);
    Route::get('parametros/0/list', [ParametrosController::class, 'list'])->name('parametros.list');
    Route::get('parametros/0/select2', [ParametrosController::class, 'select2'])->name('parametros.select2');

    Route::resource('users', UsersController::class);
    Route::get('users/0/list', [UsersController::class, 'list'])->name('users.list');
    Route::get('users/0/select2', [UsersController::class, 'select2'])->name('users.select2');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
