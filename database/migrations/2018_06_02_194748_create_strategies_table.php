<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStrategiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('strategies', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->string('name', 200);
            $table->string('description', 200);
            $table->integer('sequence', false, true);
            $table->timestamps();
            $table->softDeletes();

            $table->unique('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('strategies', function (Blueprint $table) {
            //
        });
    }
}
