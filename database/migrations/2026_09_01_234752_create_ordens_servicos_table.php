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
        Schema::create('ordens_servico', function (Blueprint $table) {
            $table->id();
            $table->string("marca_modelo");
            $table->string("numero_serie");
            $table->text("defeito_relatado");
            $table->string("status");
            $table->date("data_entrada");
            $table->date("data_previsao")->nullable();
            $table->date("data_conclusao")->nullable();
            $table->decimal("valor_orcado", 8,2)->nullable();
            $table->decimal("valor_final", 8,2)->nullable();
            $table->text("observacoes");
            $table->foreignId("cliente_id")->constrained("clientes");
            $table->foreignId("tipo_equipamento_id")->constrained("tipos_equipamento");
            $table->foreignId("tipo_servico_id")->constrained("tipos_servico");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordens_servico');
    }
};
