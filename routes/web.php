<?php

use App\Http\Controllers\ProdutosController;
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
    Route::get('/cadastrar-produto', [ProdutosController::class,  'cadastrarProduto'])->name('cadastrar.produto');
    Route::post('/cadastrar-produto', [ProdutosController::class,  'cadastrarProduto'])->name('cadastrar.produto');
});