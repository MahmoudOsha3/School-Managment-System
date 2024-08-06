<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libraries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('file_name');
            $table->foreignId('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreignId('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
            $table->foreignId('section_id')->nullable()->references('id')->on('sections')->onDelete('cascade');
            $table->foreignId('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
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
        Schema::dropIfExists('libraries');
    }
};
