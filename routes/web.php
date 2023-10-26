<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\PlaceController;
use Illuminate\Support\Facades\Route;
use App\Models\Categorie;
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

Route::name('todo')
    ->get('/inproduction', function () {
        return view('inproduction');
    }
);


Route::name('home')
    ->get('/', function () {
        return view('welcome');
    }
);


# TODO: Mudar para /login-view
Route::name('login.')
    ->group(function () {
        Route::name('view')
            ->get('/authorization-view', function () {
            return view('authorization-view');
        });
        
        Route::name('callback')
            ->post('/authorization-callback', function (Request $request) {
                $res = Http::withUrlParameters([
                    'scope' => 'identificacao'
                ])
                ->withToken($request->suap_token)
                ->acceptJson()
                ->get(config('suap.uri_eu'));

                Session::create([
                    'nome_usual'=>$res['nome_usual'],
                    'identificacao'=>$res['identificacao'],
                    'campus'=>$res['campus'],
                    'email'=>$res['email'],
                    'sexo'=>$res['sexo'],
                    'cpf'=>$res['cpf'],
                    'foto'=>$res['foto'],
                    'data_de_nascimento'=>$res['data_de_nascimento'],
                    'email_academico'=>$res['email_academico'],
                    'email_google_classroom'=>$res['email_google_classroom'],
                    'email_preferencial'=>$res['email_preferencial'],
                    'email_secundario'=>$res['email_secundario'],
                    'nome'=>$res['nome'],
                    'nome_registro'=>$res['nome_registro'],
                    'nome_social'=>$res['nome_social'],
                    'primeiro_nome'=>$res['primeiro_nome'],
                    'tipo_usuario'=>$res['tipo_usuario'],
                    'ultimo_nome'=>$res['ultimo_nome'],
                ]);
        
                return response($res)->cookie('suapToken', $request->suap_token);
            }
        );        
    }
);


Route::middleware(['suapToken'])
    ->group(function () { //middleware de proteção
        Route::name('dashboard')
            ->get('/painel', function () {
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
        });

        Route::name('materiais.')
            ->controller(MaterialController::class)
            ->group(function () {
                Route::get('/materiais/novo', 'create')->name('create');
                Route::post('/materiais', 'store')->name('store');;
            }
        );


        // TODO: Retirar do grupo que usa SUAP, pois não precisa estar logado para tentar fazer logout.
        Route::name('logout')
            ->get('/logout', function (Request $request) {
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


        Route::name('itens.')
            ->controller(ItemController::class)
            ->group(function () {

            /*
                Rotas para o controlador de Item.
            */

            /*Esta rota está retornando a view onde mostra o formulário para cadastrar um novo item*/
            Route::get('/itens/novo', 'create')->name('create');

            Route::post('/itens', 'store')->name('salvar');

            /*Esta rota está levando para a função vai processar o empréstimo do item*/
            Route::get('/itens/alugar', 'alugar')->name('alugar');

            /*Esta rota está retornando a view onde mostra o formulário para editar um item*/
            Route::get('/itens/editar', 'edit')->name('edit');

            /*Esta rota está retornando a página que lista os items que estão alugados*/
            Route::get('/itens/alugados', 'alugados')->name('alugados');

            /*Esta rota está levando para a função que processa a devolução do item*/
            Route::get('/itens/devolver', 'devolver')->name('devolver');
        });


        Route::name('categorias.')
            ->controller(CategorieController::class)
            ->group(function () {
            /*
                Rotas para o controlador de Categorias.
            */

            /*Esta rota está retornando a view index com uma lista de objetos da tabela categorias*/
            Route::name('index')->get('/categorias', 'index');

            /*Esta rota leva ao armazenamento de uma nova categoria*/
            Route::name('store')->post('/categorias', 'store');

            /*Esta rota está retornando a view create*/
            Route::name('create')->get('/categorias/nova', 'create');

            /*Esta rota serve para atualizar um objeto no banco, ela recebe um parâmetro que servirá para identifcar o objeto no banco*/
            # TODO: Deveria ser uma requisição PATCH

            /*Esta rota está retornando a view edit, ela está recebendo um parâmetro que serve para identificar o objeto no banco*/
            Route::name('edit')->get('/categorias/{categorie}/editar', 'edit');

            /*Esta rota está serve para deletar um objeto do banco, ela recebe um parâmetro para identifcar o obejto no banco*/
            # TODO: Deveria ser uma requisição DELETE
            Route::name('delete')->get('/categorias/deletar/{categorie}', 'delete');
        });


        Route::name('emprestimos.')
            ->controller(LoanController::class)
            ->group(function () {
            Route::name('create')->get('emprestimos', 'create');
        });


        Route::name('locais.')
            ->controller(PlaceController::class)->group(function () {
            Route::name('create')->get('/locais/novo', 'create');
            Route::name('store')->post('/locais', 'store');
        });
    }
);

