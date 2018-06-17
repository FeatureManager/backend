<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnvironmentParameterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('environment_parameter', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('environment_id');
            $table->unsignedInteger('parameter_id');

            $table->foreign('environment_id')->references('id')->on('environments');
            $table->foreign('parameter_id')->references('id')->on('parameters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('environment_feature');
    }
}
