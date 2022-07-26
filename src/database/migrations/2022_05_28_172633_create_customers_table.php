<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('customer_id');
            $table->string('firstname',20);
            $table->string('lastname',20);
            $table->string('email',40);
            $table->bigInteger('phoneno')->nullable();
            $table->string('comments',200)->nullable();
            $table->enum('gender',["Male","Female","Other"])->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('company_id')->on('companies');
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
        Schema::dropIfExists('customers');
    }
}
