<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemhistoricosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemhistorico', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('historico_id')->nullable();
            $table->foreign('historico_id')->references('id')->on('historico')->onDelete('cascade')->onUpdate('cascade');
            $table->string('artigo_id')->nullable();
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
        Schema::dropIfExists('itemhistorico');
    }
}
