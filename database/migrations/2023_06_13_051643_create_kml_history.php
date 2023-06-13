<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKmlHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kml_history', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('odc_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->text('url');
            $table->timestamps();
            $table->foreign('odc_id')->references('id')->on('odc');
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kml_history');
    }
}
