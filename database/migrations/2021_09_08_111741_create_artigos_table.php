<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artigo', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('codigobarra');
            $table->string('categoria_id')->nullable();
            $table->foreign('categoria_id')->references('id')->on('categoria')->onDelete('cascade')->onUpdate('cascade');
            $table->string('subcategoria_id')->nullable();
            $table->foreign('subcategoria_id')->references('id')->on('subcategoria')->onDelete('cascade')->onUpdate('cascade');
            $table->string('tipo_id')->nullable();
            $table->foreign('tipo_id')->references('id')->on('tipo')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nome')->unique()->nullable();
            $table->string('icon')->nullable();
            $table->decimal('preco', 20,2)->nullable();
            $table->decimal('iva', 20,2)->nullable();
            $table->decimal('desconto', 20,2)->nullable();
            $table->string('garantia')->nullable();
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
        Schema::dropIfExists('artigo');
    }
}
