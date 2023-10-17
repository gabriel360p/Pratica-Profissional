<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\PlaceController;
use Illuminate\Support\Facades\Route;
use App\Models\Categorie;
use App\Models\Login;
use App\Models\Material;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

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

Route::get('/inproduction', function () {
    return view('inproduction');
});


Route::get('/', function () {
    //como o suap esá centrado na rota padrão "/"
    //estou fazendo um "teste"
    try {
        //caso o cookie suapToken exista, significa que o usuário fez login e pode ir para a dashboard/painel
        if ($_COOKIE['suapToken']) {
            return redirect(url('/painel'));
        }
    } catch (\Throwable $th) {
        //caso o token não exista significa que o usuário não fez login por algum motivo, nesse caso ele é levado para página de login novamente
        return view('welcome');
    }
});


Route::middleware(['suapToken'])->group(function () {//middleware de proteção
   
//essa rota pega os dados que foram enviados pelo axios/javascript, são os dados do usuário que acabou de fazer login
Route::post('/data/user',function(Request $request){
    Login::create($request->all());
});

Route::get('/painel', function () {

    /* 
        Esta rota esta renderizando o painel principal (dashboard)
    */

    /* Pegandos todas as categorias salvas no sistema*/
    $categories = Categorie::all();

    /* Pegandos todos os materiais salvos no sistema*/
    $materials = Material::all();

    return view('dashboard', [
        'categories' => $categories,
        'materials' => $materials

    ]);
})->name('dashboard');

Route::controller(MaterialController::class)->group(function () {
    Route::get('/materiais/novo', 'create')->name('materiais.novo');
    Route::post('/materiais', 'store');
});


Route::get('/logout', function () {
    unset($_COOKIE['suapToken']);
    unset($_COOKIE['suapTokenExpirationTime']);
    unset($_COOKIE['suapScope']);
    
    setcookie("suapToken",null,strtotime("-36000 seconds"));
    setcookie("suapTokenExpirationTime",null,strtotime("-36000 seconds"));
    setcookie("suapScope",null,strtotime("-36000 seconds"));
    setcookie("laravel_session",null,strtotime("-36000 seconds"));

    try {
        Login::first()->delete();
    } catch (\Throwable $th) {
        return redirect(url('/'));
    }
    return redirect(url('/'));
});


Route::controller(ItemController::class)->group(function () {

    /*
        Rotas para o controlador de Item.
    */

    /*Esta rota está retornando a view onde mostra o formulário para cadastrar um novo item*/
    Route::get('/itens/novo', 'create')->name('itens.novo');

    Route::post('/itens', 'store')->name('itens.salvar');

    /*Esta rota está levando para a função vai processar o empréstimo do item*/
    Route::get('/itens/alugar', 'rent')->name('itens.alugar');

    /*Esta rota está retornando a view onde mostra o formulário para editar um item*/
    Route::get('/itens/editar', 'edit')->name('itens.editar');

    /*Esta rota está retornando a página que lista os items que estão alugados*/
    Route::get('/itens/alugados', 'rented')->name('itens.alugados');

    /*Esta rota está levando para a função que processa a devolução do item*/
    Route::get('/itens/devolver', 'refund')->name('itens.devolver');
});



Route::controller(CategorieController::class)->group(function () {

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
    Route::post('/categorias/{categorie}', 'update')->name('categorias.atualizar');

    /*Esta rota está retornando a view edit, ela está recebendo um parâmetro que serve para identificar o objeto no banco*/
    Route::get('/categorias/{categorie}/editar', 'edit')->name('categorias.editar');

    /*Esta rota está serve para deletar um objeto do banco, ela recebe um parâmetro para identifcar o obejto no banco*/
    Route::get('/categorias/deletar/{categorie}', 'delete');
});


Route::controller(LoanController::class)->group(function () {
    Route::get('emprestimos', 'create')->name('emprestimo.pagina');
});

Route::controller(PlaceController::class)->group(function () {
    Route::get('/locais/novo', 'create');
    Route::post('/locais', 'store');
});

});
require __DIR__ . '/auth.php';
