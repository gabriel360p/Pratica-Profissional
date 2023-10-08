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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('state',255);
            $table->string('name',255);
            $table->timestamps();
            $table->date('input_date');

            $table->text('photo')->nullable();
            
            $table->unsignedBigInteger('place_id');
            $table->foreign('place_id')->references('id')->on('places')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
            $table->unsignedBigInteger('material_id');
            $table->foreign('material_id')->references('id')->on('materials')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
