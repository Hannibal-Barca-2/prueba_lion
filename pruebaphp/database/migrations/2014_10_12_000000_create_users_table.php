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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('salas', function (Blueprint $table) {
            $table->id()->autoIncrement()->unique();
            $table->string('nombre');
            $table->foreignId('user_id')->unsigned();
            $table->foreign('user_id') 
                  ->references('id')
                  ->on('users');
        });

        Schema::create('juntas', function (Blueprint $table) {
            $table->id()->autoIncrement()->unique();
            $table->date('fecha');
            $table->time('horaInicio');
            $table->time('horaFin');
            $table->foreignId('sala_id');
            $table->foreign('sala_id')
                  ->references('id')
                  ->on('salas');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('salas');
        Schema::dropIfExists('juntas');
    }
};
