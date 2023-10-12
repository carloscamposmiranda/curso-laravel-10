<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Cria as tabela no banco.
     */
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nmproduto');
            $table->decimal('valorp', 10,2);
            $table->timestamps();
        });
    }

    /**
     * Deleta os dados do banco.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
