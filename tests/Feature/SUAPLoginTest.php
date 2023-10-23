<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class SUAPLoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * View de login.
     */
    public function test_authorization_view(): void
    {
        $response = $this->get('/authorization-view');

        $response->assertOk();

        // A página contém verificação CSRF
        $response->assertSee('_token');
    }


    /**
     * Callback de login.
     */
    public function test_authorization_callback(): void
    {   
        # Simula o SUAP
        # TODO: Usar fakers de dados
        $resposta_suap = [
            'nome_usual'=> 'Dino',
            'identificacao'=> '12345678',
            'campus' => 'CA',
            'email' => 'dino.sauro@example.com',
            'sexo' => 'M',
            'cpf' => '123456789-00',
            'foto' => 'sem-foto.png',
            'data_de_nascimento' => '26/04/1991',
            'email_academico' => 'dino.sauro@academico.ifrn.edu.br',
            'email_google_classroom' => 'dino.sauro@escolar.ifrn.edu.br',
            'email_preferencial' => 'dino.sauro@ifrn.edu.br',
            'email_secundario' => 'dino.sauro@example.com',
            'nome' => 'Dino da Silva Sauro',
            'nome_registro' => 'Dino da Silva Sauro',
            'nome_social' => '',
            'primeiro_nome' => 'Dino',
            'tipo_usuario' => 'Servidor (Docente)',
            'ultimo_nome' => 'Sauro',
        ];
        Http::fake([
            config('suap.uri_eu') . '*' => Http::response($resposta_suap, 200),
        ]);

        $response = $this->post('/authorization-callback',[
            'suap_token' => 'token-que-veio-do-suap'
        ]);

        # Assertions
        $response->assertStatus(200);

        $this->assertDatabaseHas('sessions', [
            'identificacao' => '12345678',
        ]);
    }


    /**
     * DataProvider de rotas que não requerem login.
     */
    public static function rotas_que_nao_requerem_login_provider(): array
    {   
        return [
            ['home', []],
            ['login.view', []],
            ['todo', []],
            # TODO: Adicionar ['logout', []],
        ];
    }

    /**
     * DataProvider de nomes de rotas que requerem login.
     */
    public static function rotas_que_requerem_login_provider(): array
    {   
        return [
            ['categorias.index', []],
            ['categorias.create', []],
            # TODO: Criar categoria fake para evitar o erro 404 ['categorias.edit', ['categorie' => 'fake']],
            ['emprestimos.create', []],
            ['itens.alugados', []],
            ['itens.alugar', []],
            ['itens.devolver', []],
            ['itens.edit', []],
            ['itens.create', []],
            ['locais.create', []],
            ['logout', []], # TODO: retirar
            ['materiais.create', []],
            ['dashboard', []],
        ];
    }
    
    
    /**
     * Acesso negado a páginas restritas.
     */
    #[DataProvider('rotas_que_requerem_login_provider')]
    public function test_redireciona_para_pagina_de_login($rota, $params): void
    {
        # Aplica os parâmetros à rota para produzir o URI final
        $uri = route($rota, $params);

        # Verifica se redireciona
        $this->get($uri)->assertRedirect(route('home'));
    }


    /**
     * Acesso a páginas públicas.
     */
    #[DataProvider('rotas_que_nao_requerem_login_provider')]
    public function test_acessa_pagina_publica($rota, $params): void
    {
        # Aplica os parâmetros à rota para produzir o URI final
        $uri = route($rota, $params);

        # Verifica se redireciona
        $this->get($uri)->assertOk();
    }


    /* TODO: Testar as seguintes rotas [
        ['itens.salvar', []],
        ['locais.store', []],
        ['materiais.store', []],
        ['categorias.store', []], # Não deveria aceitar get
        ['categorias.delete', ['categorie' => 'fake']],
        ['categorias.update', ['categorie' => 'fake']]
        ['login.callback', []],
    ]; */
}
