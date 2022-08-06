<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id');
            $table->foreignId('file_entry_id');
            $table->date('date');
            $table->enum('status', ['Received', 'Delivered']);
            $table->text('note');
            $table->enum('active_status', ['Active', 'Inactive'])->default('Active');
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
        Schema::dropIfExists('manage_files');
    }
}
