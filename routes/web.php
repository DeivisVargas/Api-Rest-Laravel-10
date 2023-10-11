<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DashboardController;

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

//http://localhost:8989/dashboard

Route::prefix('dashboard')->group( function (){
    Route::get( '/' , [DashboardController::class , 'index'])->name('dashboard.index');
});

//tudo que vier na rota produtos vai entrar aqui
Route::prefix('produtos')->group( function (){
    //o que vier alem de produto nas rotas
    Route::get( '/' , [ProdutosController::class , 'index'])->name('produto.index');
    //Cadastro
    Route::get('/cadastrarProduto' , [ProdutosController::class, 'cadastrarProduto'])->name('produto.cadastrar');
    Route::post('/cadastrarProduto' , [ProdutosController::class, 'cadastrarProduto'])->name('produto.cadastrar');

    //Update
    Route::get('/atualizarProduto/{id}' , [ProdutosController::class, 'edit'])->name('produto.atualizar');
    Route::put('/atualizarProduto/{id}' , [ProdutosController::class, 'edit'])->name('produto.atualizar');

    Route::delete('/delete' ,[ProdutosController::class, 'delete'])->name('produto.delete');
});

//tudo que vier clientes
Route::prefix('clientes')->group( function (){
    Route::get( '/' , [ ClientesController::class , 'index'])->name('cliente.index');
    //Cadastro
    Route::get('/cadastrarCliente' , [ClientesController::class, 'cadastrarCliente'])->name('cliente.cadastrar');
    Route::post('/cadastrarCliente' , [ClientesController::class, 'cadastrarCliente'])->name('cliente.cadastrar');

    //Update
    Route::get('/atualizarCliente/{id}' , [ClientesController::class, 'edit'])->name('cliente.atualizar');
    Route::put('/atualizarCliente/{id}' , [ClientesController::class, 'edit'])->name('cliente.atualizar');

    Route::delete('/delete' ,[ClientesController::class, 'delete'])->name('cliente.delete');
});

//tudo que vier clientes
//agrupando as rotas por controller tambem, ja que usaremos o mesmo para todas elas
Route::prefix('vendas')->controller(VendaController::class)->group( function (){
    Route::get( '/' , 'index')->name('venda.index');

    Route::get('/cadastrarVenda' , 'cadastrarVenda')->name('venda.cadastrar');
    Route::post('/cadastrarVenda' ,'cadastrarVenda')->name('venda.cadastrar');
    Route::get('/enviaComprovanteEmail/{id}', 'enviaComprovanteEmail')->name('enviaComprovanteEmail.venda');
    //rota de email

    //Update
    /*venda nao necessita ter essas rotas pois e um registro final
    Route::get('/atualizarVenda/{id}' , [VendaController::class, 'edit'])->name('venda.atualizar');
    Route::put('/atualizarVenda/{id}' , [VendaController::class, 'edit'])->name('venda.atualizar');

    Route::delete('/delete' ,[VendaController::class, 'delete'])->name('venda.delete');
    */
});

//usuarios
Route::prefix('usuario')->group( function () {
    Route::get('/', [UsuarioController::class, 'index'])->name('usuario.index');

    //cadastrar
    Route::get('/cadastrarUsuario', [UsuarioController::class, 'cadastrarUsuario'])->name('usuario.cadastrar');
    Route::post('/cadastrarUsuario', [UsuarioController::class, 'cadastrarUsuario'])->name('usuario.cadastrar');

    //rotas de update
    Route::get('/atualizarUsuario/{id}', [UsuarioController::class, 'edit'])->name('usuario.atualizar');
    Route::put('/atualizarUsuario/{id}', [UsuarioController::class, 'edit'])->name('usuario.atualizar');

    Route::delete('/delete', [UsuarioController::class, 'delete'])->name('usuario.delete');


});




