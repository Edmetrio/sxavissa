<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemcohistoricosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemcohistorico', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('cotacao_id')->nullable();
            $table->foreign('cotacao_id')->references('id')->on('cotacao')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('artigo_id')->nullable();
            $table->foreign('artigo_id')->references('id')->on('artigo')->onDelete('cascade')->onUpdate('cascade');
            $table->string('designacao')->nullable();
            $table->decimal('quantidade', 20,2)->nullable();
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itemcohistorico');
    }
}
