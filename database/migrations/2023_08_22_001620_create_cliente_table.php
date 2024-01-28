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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('cnpj', 14)->unique();
            $table->string('razaosocial', 120)->index();
            $table->string('endereco', 120);
            $table->string('numero', 60);
            $table->string('bairro', 120);
            $table->string('complemento', 120)->nullable();
            $table->unsignedBigInteger('cidade_id');
            $table->string('cep', 9);
            $table->string('fone1', 20)->nullable();
            $table->string('fone2', 20)->nullable();
            $table->string('contato', 120)->nullable();
            $table->string('email', 255)->nullable();
            $table->integer('tabela0', )->nullable()->default('0');
            $table->integer('tabela1', )->nullable()->default('0');
            $table->datetime('ultima_cotacao')->nullable();
            $table->string('senha', 100)->default(' ');
            $table->integer('nivel')->default(1);
            $table->string('iestadual', 20)->default(' ');
            $table->string('inativo', 1)->default(0);
            $table->timestamps();

            $table->foreign('cidade_id')->references('id')->on('cidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
