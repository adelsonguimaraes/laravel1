<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\TarefasController;
use App\Http\Controllers\Auth\LoginController;
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

Route::get('/', [HomeController::class, 'index']);
Route::view('/teste', 'teste');

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);

Route::resource('todo', 'TodoController');
/*
    Rotas criadas com resource
    --------------------------
    GET - /todo - index - todo.index - LISTA OS ITENS
    GET - /todo/create - create - todo.create - FORM DE CRIAÇÃO
    POST - /todo - store - todo.store - RECEBER OS DADOS E ADD ITEM
    GET - /todo/{id} - show - todo.show - ITEM INDIVIDUAL
    GET - /todo/{id}/edit - edit - todo.edit - FORM DE EDIÇÃO
    PUT - /todo/{id}/ - update - todo.update - RECEBER OS DADOS E UPDATE ITEM
    DELETE - /todo/{id} - destroy - todo.destroy - DELETAR O ITEM
*/

Route::prefix('/tarefas')->group(function() {
    Route::get('/', [TarefasController::class, 'list'])->name('tarefas.list'); // listagem de tarefas

    Route::get('add', [TarefasController::class, 'add'])->name('tarefas.add'); // tela de adição de nova tarefa
    Route::post('add', [TarefasController::class, 'addAction']); // ação de adição de nova tarega

    Route::get('edit/{id}', [TarefasController::class, 'edit'])->name('tarefas.edit'); // tela de edição
    Route::post('edit/{id}', [TarefasController::class, 'editAction']); // ação de edição

    Route::get('delete/{id}', [TarefasController::class, 'del'])->name('tarefas.del'); // ação de deletar

    Route::get('marcar/{id}', [TarefasController::class, 'done'])->name('tarefas.done'); // marcar resolvido ou não resolvido
});

Route::prefix('/config')->group(function () {

    Route::get('/', [ConfigController::class, 'index'])->name('config.index')->middleware('auth');
    Route::post('/', [ConfigController::class, 'index']);
    Route::get('info', [ConfigController::class, 'info']);
    Route::get('permissoes', [ConfigController::class, 'permissoes']);

});

Route::fallback(function () {
    return view('404');
});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
