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
        Schema::create('tabelas', function (Blueprint $table) {
            $table->id();
            $table->integer('tabela')->default(1);
            $table->foreignId('regiao_id')->references('id')->on('regioes');
            $table->foreignId('peso_id')->references('id')->on('pesos');
            $table->decimal('capital', 10, 2)->default(0);
            $table->decimal('interior', 10, 2)->default(0);
            $table->decimal('redespacho', 10, 2)->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabelas');
    }
};
