<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProdutosController;
use GuzzleHttp\Exception\ClientException;
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
    return view('index');
});

//-------PRODUTOS
Route::prefix('produtos')->group(function(){
    Route::get('/', [ProdutosController::class,  'index'])->name('produto.index');
    Route::delete('/delete', [ProdutosController::class,  'delete'])->name('produto.delete');
    //CADASTRO DE PRODUTO
    Route::get('/cadastrar-produto', [ProdutosController::class,  'cadastrarProduto'])->name('cadastrar.produto');
    Route::post('/cadastrar-produto', [ProdutosController::class,  'cadastrarProduto'])->name('cadastrar.produto');
    //EDITAR PRODUTOS
    Route::get('/editar-produto/{id}', [ProdutosController::class,  'atualizarProduto'])->name('atualizar.produto');
    Route::put('/editar-produto/{id}', [ProdutosController::class,  'atualizarProduto'])->name('atualizar.produto');

});

//-------CLIENTES
Route::prefix('clientes')->group(function(){
    Route::get('/', [ClientesController::class, 'index'])->name('clientes.index');
    Route::get('/delete', [ClientesController::class, 'delete'])->name('cliente.delete');
    //CADASTROS
    Route::get('/cadastrar-cliente', [ClientesController::class, 'cadastrarCliente'])->name('cadastrar.cliente');
    Route::post('/cadastrar-cliente', [ClientesController::class, 'cadastrarCliente'])->name('cadastrar.cliente');
    //ATUALIZAR
    Route::get('/atualizar-cadastro-cliente/{$id}', [ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');
    Route::put('/atualizar-cadastro-cliente/{$id}', [ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');
});