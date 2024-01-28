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
        Schema::create('parametros', function (Blueprint $table) {
            $table->id();
            $table->decimal('capatazia_min',6,2)->nullable();
            $table->decimal('capatazia_val',10,4)->nullable();
            $table->decimal('taxanf_capital',6,2)->nullable();
            $table->decimal('taxanf_interior',6,2)->nullable();
            $table->decimal('frap_valor',10,4)->nullable();
            $table->integer('pesomax',)->default('0');
            $table->decimal('taxanf_capital2',6,2)->nullable();
            $table->decimal('taxanf_interior2',6,2)->nullable();
            $table->decimal('valornf',10,4)->nullable();
            $table->decimal('valormax_capital',10,4)->nullable();
            $table->decimal('valormax_interior',10,4)->nullable();
            $table->decimal('valormax_aeroporto',10,4)->nullable();
            $table->string('email')->default(' ');
            $table->decimal('taxa1',10,2)->default('0.00');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parametros');
    }
};
