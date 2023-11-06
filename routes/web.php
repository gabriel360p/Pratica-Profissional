<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EmprestimoController;
use App\Http\Controllers\LocalController;
use App\Models\Categoria;
use Illuminate\Support\Facades\Route;
use App\Models\Material;
use App\Models\Session;
use Illuminate\Http\Request;

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

Route::get('/em-producao', function () {
    return view('inproduction');
});

// Route::middleware(['GuestMiddleware'])->group(function () { //middleware de proteção

Route::get('/', function () {
    return view('welcome');
});

Route::get('/authorization-view', function () {
    return view('authorization-view');
});

// });


Route::middleware(['suapToken'])->group(function () { //middleware de proteção

    // Route::get('/materiais/categoria/{categoria}', function ($categoria) {
    //     try {
    //         $cat = \DB::table('categoria_material')->where('categoria_id', '=', $categoria)->get();

    //         $mat = \DB::table('materials')->where('id', '=', $cat[0]->material_id)->get();

    //         return view('dashboard', ['materials' => $mat, 'categorias' => Categoria::all()]);
    //     } catch (\Throwable $th) {
    //         return back();
    //     }
    // })->name('material.categoria');


    Route::get('/painel', function () {

        /* 
          Esta rota esta renderizando o painel principal (dashboard)
        */

        return view('dashboard', [
            /* Pegandos todas as categorias salvas no sistema*/
            'categorias' => Categoria::all(),
            /* Pegandos todos os materiais salvos no sistema*/
            'materials' => Material::all()
        ]);
    })->name('dashboard');

    Route::controller(MaterialController::class)->group(function () {
        Route::get('/materiais/novo', 'create')->name('materiais.novo');
        Route::post('/materiais', 'store');

        Route::get('/materiais/deletar/{material}', 'destroy');

        Route::get('/materiais', 'index');

        Route::post('/materiais/{material}', 'update')->name('materiais.atualizar');

        Route::get('/materiais/{material}/editar', 'edit')->name('materiais.editar');
    });


    Route::get('/logout', function (Request $request) {
        unset($_COOKIE['suapToken']);
        unset($_COOKIE['suapTokenExpirationTime']);
        unset($_COOKIE['suapScope']);

        setcookie('suapToken', null, -1);
        setcookie('suapTokenExpirationTime', null, -1);
        setcookie('suapScope', $request->scope, null, -1);

        try {
            Session::first()->delete();
        } catch (\Throwable $th) {
            return redirect(url('/'));
        }
        return redirect(url('/'));
    });


    Route::controller(ItemController::class)->group(function () {

        /*
        Rotas para o controlador de Item.
    */


        Route::get('/itens', 'index')->name('itens.index');



        /*Esta rota está retornando a view onde mostra o formulário para cadastrar um novo item*/
        Route::get('/itens/novo', 'create')->name('itens.novo');

        Route::post('/itens', 'store')->name('itens.salvar');

        /*Esta rota está levando para a função vai processar o empréstimo do item*/
        Route::get('/itens/alugar', 'rent')->name('itens.alugar');

        /*Esta rota está retornando a view onde mostra o formulário para editar um item*/
        Route::post('/itens/{item}', 'update')->name('itens.atualizar');
        Route::get('/itens/editar/{item}', 'edit')->name('itens.editar');

        /*Esta rota está retornando a página que lista os items que estão alugados*/
        // Route::get('/itens/alugados', 'rented')->name('itens.alugados');

        /*Esta rota está levando para a função que processa a devolução do item*/
        Route::get('/itens/devolver', 'refund')->name('itens.devolver');

        Route::get('/itens/deletar/{item}', 'destroy')->name('itens.deletar');
    });



    Route::controller(CategoriaController::class)->group(function () {

        /*
        Rotas para o controlador de Categorias.
    */

        /*Esta rota está retornando a view index com uma lista de objetos da tabela categorias*/
        Route::get('/categorias', 'index');

        /*Esta rota leva ao armazenamento de uma nova categoria*/
        Route::post('/categorias', 'store');

        /*Esta rota está retornando a view create*/
        Route::get('/categorias/nova', 'create');

        /*Esta rota serve para atualizar um objeto no banco, ela recebe um parâmetro que servirá para identifcar o objeto no banco*/
        Route::post('/categorias/{categoria}', 'update')->name('categorias.atualizar');

        /*Esta rota está retornando a view edit, ela está recebendo um parâmetro que serve para identificar o objeto no banco*/
        Route::get('/categorias/{categoria}/editar', 'edit')->name('categorias.editar');

        /*Esta rota está serve para deletar um objeto do banco, ela recebe um parâmetro para identifcar o obejto no banco*/
        Route::get('/categorias/deletar/{categoria}', 'destroy');
    });


    Route::controller(EmprestimoController::class)->group(function () {
        Route::get('emprestimos/novo', 'create')->name('emprestimos.pagina');
    });


    Route::controller(LocalController::class)->group(function () {
        Route::get('/locais/novo', 'create');
        Route::post('/locais', 'store');
        Route::get('/locais/deletar/{local}', 'destroy')->name('locais.delete');
        Route::get('/locais/{local}/edit', 'edit')->name('locais.editar');
        Route::post('/locais/{local}', 'update')->name('locais.update');

        Route::get('/locais', 'index');
    });
});
