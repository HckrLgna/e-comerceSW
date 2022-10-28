<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->date('fecha');
            $table->string('lugar');
            $table->unsignedBigInteger('fotografo_id');
            $table->foreign('fotografo_id')->on('fotografos')->references('id')
                ->onDelete('cascade');
            $table->unsignedBigInteger('organizador_id');
            $table->foreign('organizador_id')->on('organizadors')->references('id')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
};
