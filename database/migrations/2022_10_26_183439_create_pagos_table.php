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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->float('monto');
            $table->string('owner');
            $table->string('card_number');
            $table->string('expiration');
            $table->string('security_code');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('suscripcion_id');
            $table->foreign('user_id')->on('users')->references('id')
                ->onDelete('cascade');
            $table->foreign('suscripcion_id')->on('suscripciones')->references('id')
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
        Schema::dropIfExists('pagos');
    }
};
