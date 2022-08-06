<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->foreignId('class_name_id');
            $table->foreignId('group_id')->nullable();
            $table->foreignId('medium_id')->nullable();
            $table->foreignId('section_id')->nullable();
            $table->integer('roll');
            $table->text('student_photo')->nullable();
            $table->foreignId('user_id');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('student_infos');
    }
}
