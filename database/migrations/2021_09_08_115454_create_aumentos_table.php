<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aumento', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('users_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('idacesso')->nullable();
            $table->foreign('idacesso')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('artigo_id')->nullable();
            $table->foreign('artigo_id')->references('id')->on('artigo')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('pagamento_id')->nullable();
            $table->foreign('pagamento_id')->references('id')->on('pagamento')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('unidade_id')->nullable();
            $table->foreign('unidade_id')->references('id')->on('unidade')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('materia_id')->nullable();
            $table->foreign('materia_id')->references('id')->on('materia')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('armazem_id')->nullable();
            $table->foreign('armazem_id')->references('id')->on('armazem')->onDelete('cascade')->onUpdate('cascade');
            $table->string('numerolote')->nullable();
            $table->decimal('custo', 20,2)->nullable();
            $table->decimal('quantidade', 20,2)->nullable();
            $table->string('validade')->nullable();
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
        Schema::dropIfExists('aumento');
    }
}
