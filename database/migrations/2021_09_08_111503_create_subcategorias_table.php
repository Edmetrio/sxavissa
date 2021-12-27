<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategoria', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categoria')->onDelete('cascade')->onUpdate('cascade');
            /* $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade'); */
            $table->string('nome')->nullable();
            $table->string('icon')->nullable();
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
        Schema::dropIfExists('subcategoria');
    }
}
