<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('tran_no');
            $table->integer('total_amount');
            $table->string('note')->nullable();

            $table->unsignedBigInteger('source')->nullable();
            $table->foreign('source')
                ->references('id')
                ->on('bank_accounts')
                ->onDelete('cascade');
            $table->unsignedBigInteger('payto')->nullable();
            $table->foreign('payto')
                ->references('id')
                ->on('bank_accounts')
                ->onDelete('cascade');
            
            $table->integer('amount');
            $table->string('cheque_no')->nullable();
            $table->string('cq_date')->nullable();
            $table->string('refference');
            
            
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
        Schema::dropIfExists('transactions');
    }
}
