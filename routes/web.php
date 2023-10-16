<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VendasController;
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

Route::prefix('dashboard')->group(function(){
    Route::get('/', [DashboardController::class,  'index'])->name('dashboard.index');
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
    Route::delete('/delete', [ClientesController::class, 'delete'])->name('cliente.delete');
    //CADASTROS
    Route::get('/cadastrar-cliente', [ClientesController::class, 'cadastrarCliente'])->name('cadastrar.cliente');
    Route::post('/cadastrar-cliente', [ClientesController::class, 'cadastrarCliente'])->name('cadastrar.cliente');
    //ATUALIZAR
    Route::get('/atualizar-cadastro-cliente/{id}', [ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');
    Route::put('/atualizar-cadastro-cliente/{id}', [ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');
});

//-------VENDAS
Route::prefix('vendas')->group(function(){
    Route::get('/', [VendasController::class, 'index'])->name('vendas.index');
    Route::delete('/delete', [VendasController::class, 'delete'])->name('vendas.delete');
    //CADASTROS
    Route::get('/cadastrar-venda', [VendasController::class, 'cadastrarVenda'])->name('cadastrar.venda');
    Route::post('/cadastrar-venda', [VendasController::class, 'cadastrarVenda'])->name('cadastrar.venda');
    //ENVIO DE EMAIL
    Route::get('/sendEmailCompra/{id}', [VendasController::class, 'sendEmailCompra'])->name('sendEmailCompra.venda');
    //Route::post('/sendEmailCompra{id}', [VendasController::class, 'sendEmailCompra'])->name('sendEmailCompra.venda');
});

//-------USUARIOS
Route::prefix('usuarios')->group(function(){
    Route::get('/', [UsuarioController::class,  'index'])->name('usuarios.index');
    Route::delete('/delete', [UsuarioController::class,  'delete'])->name('usuario.delete');
    //CADASTRO DE PRODUTO
    Route::get('/cadastrar-usuario', [UsuarioController::class,  'cadastrarUsuario'])->name('cadastrar.usuario');
    Route::post('/cadastrar-usuario', [UsuarioController::class,  'cadastrarUsuario'])->name('cadastrar.usuario');
    //EDITAR PRODUTOS
    Route::get('/editar-usuario/{id}', [UsuarioController::class,  'atualizarUsuario'])->name('atualizar.usuario');
    Route::put('/editar-usuario/{id}', [UsuarioController::class,  'atualizarUsuario'])->name('atualizar.usuario');

});