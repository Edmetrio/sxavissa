<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacao', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('users_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('userscli_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('pagamento_id')->nullable();
            $table->foreign('pagamento_id')->references('id')->on('pagamento')->onDelete('cascade')->onUpdate('cascade');
            $table->string('tipotransacao_id')->nullable();
            $table->foreign('tipotransacao_id')->references('id')->on('tipotransacao')->onDelete('cascade')->onUpdate('cascade');
            $table->string('validade')->nullable();
            $table->string('datapagamento')->nullable();
            $table->string('banco')->nullable();
            $table->string('caixa')->nullable();
            $table->decimal('subtotal', 20,2)->nullable();
            $table->decimal('iva', 20,2)->nullable();
            $table->decimal('desconto', 20,2)->nullable();
            $table->decimal('valortotal', 20,2)->nullable();
            $table->decimal('valorpago', 20,2)->nullable();
            $table->decimal('valordevido', 20,2)->nullable();
            $table->string('estado')->default('on')->nullable();
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
        Schema::dropIfExists('transacao');
    }
}
