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
        Schema::create('itens', function (Blueprint $table) {
            $table->id();
            $table->string('estado',255);
            // $table->string('nome',255);

            //vai registrar a data de entrada do item
            $table->timestamps();

            $table->text('foto')->nullable();
            
            $table->unsignedBigInteger('local_id');
            $table->foreign('local_id')->references('id')->on('locais')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
            $table->unsignedBigInteger('material_id');
            $table->foreign('material_id')->references('id')->on('materiais')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itens');
    }
};
