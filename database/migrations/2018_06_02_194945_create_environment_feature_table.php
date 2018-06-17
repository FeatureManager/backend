<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnvironmentFeatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('environment_feature', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('environment_id');
            $table->unsignedInteger('feature_id');
            $table->integer('sequence', false, true);

            $table->foreign('environment_id')->references('id')->on('environments');
            $table->foreign('feature_id')->references('id')->on('features');
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
