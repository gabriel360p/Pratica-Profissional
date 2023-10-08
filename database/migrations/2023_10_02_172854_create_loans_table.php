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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();

            // usuario que autorizou
            $table->unsignedBigInteger('user_who_authorized_id');
            $table->foreign('user_who_authorized_id')->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            //usuario que entregou
            $table->unsignedBigInteger('user_who_delivered_id');
            $table->foreign('user_who_delivered_id')->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            //usuario que recebeu  
            $table->unsignedBigInteger('user_who_received_id');
            $table->foreign('user_who_received_id')->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            //usuario que entregou
            $table->unsignedBigInteger('user_who_returned_id');
            $table->foreign('user_who_returned_id')->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
            //item que foi pego
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('id')->on('items')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
