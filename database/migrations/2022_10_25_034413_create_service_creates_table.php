<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceCreatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_creates', function (Blueprint $table) {
            $table->id();
            $table->string('cname');
            $table->string('invoice_no')->unique()->nullValue();
            $table->string('deli_date')->nullable();
            $table->string('cphone');
            $table->string('p_name')->nullable();
            $table->string('p_code')->nullable();
            $table->string('caddress')->nullable();
            $table->string('pdescription')->nullable();
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
        Schema::dropIfExists('service_creates');
    }
}
