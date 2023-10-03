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


Route::get('/painel', function () {
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
    Route::get('/itens/novo','create')->name('itens.create');
    Route::get('/itens/rent','rent')->name('itens.rent');
    Route::get('/itens/edit','edit')->name('itens.edit');
    Route::get('/itens/rented','rented')->name('itens.rented');
    Route::get('/itens/refund','refund')->name('itens.refund');
});



Route::controller(CategorieController::class)->group(function(){

    /*
        Rotas para o controlador de Categorias.
    */

    /*Esta rota está retornando a view index com uma lista de objetos da tabela categorias*/
    Route::get('/categorias','index');  

    /*Esta rota leva ao armazenamento de uma nova categoria*/
    Route::post('/categorias','store'); 
    
    /*Esta rota está retornando a view create*/
    Route::get('/categorias/nova','create');

    /*Esta rota serve para atualizar um objeto no banco, ela recebe um parâmetro que servirá para identifcar o objeto no banco*/
    Route::post('/categorias/{categorie}','update')->name('categorias.atualizar');

    /*Esta rota está retornando a view edit, ela está recebendo um parâmetro que serve para identificar o objeto no banco*/  
    Route::get('/categorias/{categorie}/editar','edit')->name('categorias.editar');

    /*Esta rota está serve para deletar um objeto do banco, ela recebe um parâmetro para identifcar o obejto no banco*/  
    Route::get('/categorias/apagar/{categorie}','delete');
});


require __DIR__.'/auth.php';
