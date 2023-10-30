<?php

use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post(
    '/authorization-callback',
    function (Request $request) {
        $request->token;

        $res = Http::withUrlParameters([
            'scope' => 'identificacao'
        ])->withToken($request->token)
            ->acceptJson()
            ->get('https://suap.ifrn.edu.br/api/eu/');

        if (Session::first()) {
            return redirect('/painel');
        } else {

            Session::create([
                'nome_usual' => $res['nome_usual'],
                'identificacao' => $res['identificacao'],
                'campus' => $res['campus'],
                'email' => $res['email'],
                'sexo' => $res['sexo'],
                'cpf' => $res['cpf'],
                'foto' => $res['foto'],
                'data_de_nascimento' => $res['data_de_nascimento'],
                'email_academico' => $res['email_academico'],
                'email_google_classroom' => $res['email_google_classroom'],
                'email_preferencial' => $res['email_preferencial'],
                'email_secundario' => $res['email_secundario'],
                'nome' => $res['nome'],
                'nome_registro' => $res['nome_registro'],
                'nome_social' => $res['nome_social'],
                'primeiro_nome' => $res['primeiro_nome'],
                'tipo_usuario' => $res['tipo_usuario'],
                'ultimo_nome' => $res['ultimo_nome'],
            ]);
        }

        return response($res, 200);
    }
);
