<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemtransacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemtransacao', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('users_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('idacesso')->nullable();
            $table->foreign('idacesso')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('transacao_id')->nullable();
            $table->foreign('transacao_id')->references('id')->on('transacao')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('artigo_id')->nullable();
            $table->foreign('artigo_id')->references('id')->on('artigo')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('quantidade', 20,2)->nullable();
            $table->decimal('custo', 20,2)->nullable();
            $table->decimal('preco', 20,2)->nullable();
            $table->decimal('iva', 20,2)->nullable();
            $table->decimal('desconto', 20,2)->nullable();
            $table->decimal('subtotal', 20,2)->nullable();
            $table->string('estado')->default('on');
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
        Schema::dropIfExists('itemtransacao');
    }
}
