<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeatureStrategyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_strategy', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('feature_id');
            $table->unsignedInteger('strategy_id');
            $table->string('input', 200)->comment('Data to be evaluated with the feature strategy');

            $table->foreign('feature_id')->references('id')->on('features');
            $table->foreign('strategy_id')->references('id')->on('strategies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feature_strategy');
    }
}
