<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Site\PainelAdministrativoController as PainelAdministrativo;

use App\Http\Controllers\Site\ContaBancariaController as ContaBancaria;

use App\Http\Controllers\Site\InvestimentosController as Investimentos;

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

Route::get('/', [PainelAdministrativo::class, 'index'])->name('painelAdministrativo');
Route::post('/', [PainelAdministrativo::class, 'store'])->name('fetchUsers');

Route::get('contaBancaria', [ContaBancaria::class, 'index'])->name('contaBancaria');
Route::put('contaBancaria', [ContaBancaria::class, 'update'])->name('updateContaBancaria');

Route::get('investimentos', [Investimentos::class, 'index'])->name('investimentos');
Route::put('investimentos', [Investimentos::class, 'update'])->name('updateInvestimentos');
