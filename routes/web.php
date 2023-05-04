<?php

use App\Http\Controllers\DominioProdutosController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\PagamentoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoExternoController;
use App\Http\Controllers\ProdutoTelegramCanaisController;
use App\Http\Controllers\UsuarioEmpresaController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('posts', PostController::class);
Route::resource('pagamentos', PagamentoController::class);
Route::resource('users', UserController::class);

Route::resource('empresa', EmpresasController::class);
Route::resource('produto', ProdutoController::class);

Route::controller(UsuarioEmpresaController::class)->group(function(){
    Route::get('userEmpresa/{empresa}','index')->name('userEmpresa');
    Route::post('saveUserEmpresa','update')->name('saveUserEmpresa');
});

Route::resource('dominioProduto',DominioProdutosController::class);
Route::resource('ProdutoExterno',ProdutoExternoController::class);
Route::resource('ProdutoTelegram',ProdutoTelegramCanaisController::class);