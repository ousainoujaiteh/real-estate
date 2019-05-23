<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('description');
            $table->boolean('create_user')->default(0);
            $table->boolean('create_payment')->default(0);
            $table->boolean('view_payment')->default(0);
            $table->boolean('view_dashboard')->default(0);
            $table->boolean('create_role')->default(0);
            $table->boolean('view_report')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        App\Role::create([
            'name' => 'Super Admin Role',
            'description' => 'Default',
            'create_user' => 1,
            'create_payment' => 1,
            'view_payment' => 1,
            'view_dashboard' => 1,
            'create_role' => 1,
            'view_report' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
