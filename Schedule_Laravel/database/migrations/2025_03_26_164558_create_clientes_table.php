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
    Schema::create('clientes', function (Blueprint $table) {
        $table->id();
        $table->string('nome_cliente'); // Nome do cliente
        $table->string('telefone_cliente'); // Telefone do cliente
        $table->enum('tipo_telefone_cliente', ['1', '2', '3']); // Tipo de telefone (1 = Celular, 2 = Fixo, 3 = Whatsapp)
        $table->date('data_cadastro_cliente'); // Data de cadastro
        $table->text('observacao_cliente')->nullable(); // Observações
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
        Schema::dropIfExists('clientes');
    }
};