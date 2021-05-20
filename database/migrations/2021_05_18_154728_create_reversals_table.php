<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReversalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reversals', function (Blueprint $table) {
            $table->id();
            $table->decimal('valor_estorno', 10, 2);
            $table->unsignedBigInteger('credit_id')->nullable();
            $table->foreign('credit_id')->references('id')->on('credits');
            $table->unsignedBigInteger('debit_id')->nullable();
            $table->foreign('debit_id')->references('id')->on('debits');
            $table->unsignedBigInteger('account_id')->nullable();
            $table->foreign('account_id')->references('id')->on('accounts');
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
        Schema::dropIfExists('reversals');
    }
}