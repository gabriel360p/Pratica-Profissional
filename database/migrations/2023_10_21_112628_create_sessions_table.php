<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->string('nome_usual');
            $table->string('nome');
            $table->string('ultimo_nome');
            $table->string('primeiro_nome');
            $table->string('nome_registro');
            $table->string('tipo_usuario');
            $table->string('nome_social')->nullable();
            $table->string('sexo');
            $table->string('cpf')->unique();
            $table->string('foto')->unique();
            $table->string('identificacao')->unique();
            $table->string('data_de_nascimento');
            $table->string('campus');
            $table->string('email')->unique();
            $table->string('email_academico')->unique();
            $table->string('email_preferencial')->unique();
            $table->string('email_google_classroom')->unique();
            $table->string('email_secundario')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
