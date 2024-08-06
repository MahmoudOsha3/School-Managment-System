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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name') ;
            $table->string('email') ;
            $table->string('password') ;
            $table->text('address') ;
            $table->date('joining_date');
            $table->foreignId('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreignId('specialization_id')->references('id')->on('specializations')->onDelete('cascade');
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
        Schema::dropIfExists('teachers');
    }
};
