<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->date('dob');
            $table->enum('religion', ['Islam', 'Hinduism', 'Buddhism', 'Christianity', 'Other']);
            $table->string('email', 40)->nullable();
            $table->foreignId('user_id');
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
        Schema::dropIfExists('students');
    }
}
