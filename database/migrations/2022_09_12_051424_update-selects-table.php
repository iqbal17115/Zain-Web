<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSelectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('selects', function (Blueprint $table) {
            $table->bigInteger('home_id1')->unsigned();
            $table->foreign('home_id1')->references('home_id')->on('homes');
            $table->bigInteger('home_id2')->unsigned();
            $table->foreign('home_id2')->references('home_id')->on('homes');
            $table->bigInteger('home_id3')->unsigned();
            $table->foreign('home_id3')->references('home_id')->on('homes');
            $table->bigInteger('home_id4')->unsigned();
            $table->foreign('home_id4')->references('home_id')->on('homes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
