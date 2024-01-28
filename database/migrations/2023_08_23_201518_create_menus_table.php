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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('descricao', 40);
            $table->integer('pai', )->default('0');
            $table->unsignedBigInteger('program_id')->default('0');
            $table->string('classe', 60)->nullable();
            $table->integer('ordem', )->nullable();
            $table->string('tipo', 1)->default('C');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
