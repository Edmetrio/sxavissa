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
            $table->uuid('transacao_id')->nullable();
            $table->foreign('transacao_id')->references('id')->on('transacao')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('pagamento_id')->nullable();
            $table->foreign('pagamento_id')->references('id')->on('pagamento')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('quantidade', 20,2)->nullable();
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
