<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('localidades', function (Blueprint $table) {
            $table->id();
            $table->string('uf', 2);
            $table->string('descricao', 120)->index();
            $table->string('cep1', 9)->index();
            $table->string('cep2', 9);
            $table->string('roteirizacao', 3);
            $table->string('unidade', 5);
            $table->integer('tabela', );
            $table->string('tarifa', 20);
            $table->string('grupo', 20);
            $table->tinyInteger('frap', )->default('0');
            $table->string('prazo', 10)->default(' ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('localidades');
    }
};
