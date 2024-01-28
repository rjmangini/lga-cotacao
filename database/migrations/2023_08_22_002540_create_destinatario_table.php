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
        Schema::create('destinatarios', function (Blueprint $table) {
            $table->id();
            $table->integer('cliente_id', );
            $table->string('cnpj', 14)->index();
            $table->string('razaosocial', 120)->index();
            $table->string('iestadual', 20)->nullable();
            $table->string('endereco', 120);
            $table->string('numero', 60);
            $table->string('complemento', 60)->nullable();
            $table->string('bairro', 60)->nullable();
            $table->string('cep', 9);
            $table->unsignedBigInteger('cidade_id');
            $table->string('fone', 20)->nullable();
            $table->string('email', 250)->nullable();
            $table->timestamps();

            $table->foreign('cidade_id')->references('id')->on('cidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinatarios');
    }
};
