<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('indentity_name');
            $table->string('indentity_number');
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('lname');
            $table->integer('phone');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('gender');
            $table->string('nationality');
            $table->decimal('deposit');
            $table->string('type');
            $table->json('attributes')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
