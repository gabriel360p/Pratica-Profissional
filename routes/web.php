<?php

// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\CategorieController;
use Illuminate\Support\Facades\Route;
use App\Models\Categorie;
use App\Models\Material;


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
    return view('auth.login');
});


Route::get('/dashboard', function () {
    $categories= Categorie::all();
    $materials= Material::all();

    return view('dashboard',[
        'categories'=>$categories,
        'materials'=>$materials

    ]);
})->name('dashboard');







Route::get('/inproduction', function () {
    return view('inproduction');
});

















// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Route::controller(MaterialController::class)->group(function(){
// });

Route::controller(ItemController::class)->group(function(){

     /*
        Rotas para o controlador de Item
        Nesta situação está sendo usado uma "rota grupo", referenciando o ItemController,
        todas as rotas que são feitas dentro desse grupo irão ter o ItemController como 
        "referência".
    */

    /*Rota GET que acessa a função 'create' na classe ItemController, o seu retorno devolve uma página para preencher com dados sobre um novo item a ser adicionado*/
    Route::get('/itens/create','create')->name('itens.create');
    Route::get('/itens/rent','rent')->name('itens.rent');
    Route::get('/itens/edit','edit')->name('itens.edit');
    Route::get('/itens/rented','rented')->name('itens.rented');
    Route::get('/itens/refund','refund')->name('itens.refund');
});


Route::controller(CategorieController::class)->group(function(){

    /*
        Rotas para o controlador de Categorias
        Nesta situação está sendo usado uma "rota grupo", referenciando o CategorieController,
        todas as rotas que são feitas dentro desse grupo irão ter o CategorieController como 
        "referência".
    */

    /*Rota GET que acessa a função 'index' na classe CategorieController, o seu retorno devolve uma página e uma array de objetos*/
    Route::get('/categories','index');  

    /*Rota POST que acessa a função 'store' na classe CategorieController, essa função ela serve para salvar os dados no banco de dados*/
    Route::post('/categories','store');
    
    /*Rota GET que acessa a função 'create' na classe CategorieController, ela devolve uma página de cadastro para salvar os dados de uma nova categoria*/
    Route::get('/categories/create','create');

    /*Rota POST que acessa a função 'update' na classe CategorieController, nesta rota está passando o 'id' do objeto para que assim ele possa ser identificado no banco,
    a função dela é de atualizar os dados de um determinado objeto no banco
    */
    Route::post('/categories/{categorie}','update')->name('categories.update');

    /*Rota GET que acessa a função 'edit' na classe CategorieController, nesta rota está passando o 'id' do objeto para que assim ele possa ser identificado no banco,
    a função dela é mostrar carregar uma página que contém os dados desse determinado objeto que será identificado a partir do id passado.
    */
    Route::get('/categories/{categorie}/edit','edit')->name('categories.edit');

    /*Rota GET que acessa a função 'destroy' na classe CategorieController, nesta rota está passando o 'id' do objeto para que assim ele possa ser identificado no banco,
    a função dela é poder apagar esse objeto do banco
    */
    Route::get('/categories/destroy/{categorie}','delete');
});


require __DIR__.'/auth.php';
