<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constructions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->longText('details');
            $table->decimal('cost');
            $table->string('worker_name');
            $table->string('worker_type');
            $table->string('work_type');
            $table->string('status');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('location');
            $table->integer('customer_id')->nullable();
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
        Schema::dropIfExists('constructions');
    }
}
