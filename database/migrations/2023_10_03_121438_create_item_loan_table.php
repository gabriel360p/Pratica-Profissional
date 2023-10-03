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
        Schema::create('item_loan', function (Blueprint $table) {
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('id')->on('items');
            $table->unsignedBigInteger('loan_id');
            $table->foreign('loan_id')->references('id')->on('loans');
            //Estado de quando foi emprestado
            $table->text('loan_status');
            //Estado de quando foi devolvido
            $table->text('return_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_loan');
    }
};
