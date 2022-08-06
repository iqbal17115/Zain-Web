<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->string('father_name', 30);
            $table->string('mother_name', 30);
            $table->string('father_occupation', 30)->nullable();
            $table->string('mother_occupation', 30)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('nationality', 40)->nullable();
            $table->string('present_address', 100)->nullable();
            $table->string('permanent_address', 100)->nullable();
            $table->text('parent_photo')->nullable();
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
        Schema::dropIfExists('parent_infos');
    }
}
