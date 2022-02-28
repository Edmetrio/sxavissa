<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItempagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itempagamento', function (Blueprint $table) {
            $table->uuid('users_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('idacesso')->nullable();
            $table->foreign('idacesso')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('historico_id')->nullable();
            $table->foreign('historico_id')->references('id')->on('historico')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('aumento_id')->nullable();
            $table->foreign('historico_id')->references('id')->on('historico')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('pagamento_id')->nullable();
            $table->foreign('pagamento_id')->references('id')->on('pagamento')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('valor', 20,2)->nullable();
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
        Schema::dropIfExists('itempagamento');
    }
}
