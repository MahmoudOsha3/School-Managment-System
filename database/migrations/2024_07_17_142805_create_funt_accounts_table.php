<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // صندوق الحساب بتاع المدرسة بيشوف المبالغ اللي داخله و اللي خارجه
    public function up()
    {
        Schema::create('funt_accounts', function (Blueprint $table) {
            $table->id();
            $table->date('date') ;
            $table->foreignId('recepit_id')->references('id')->on('receipt_students')->onDelete('cascade');
            $table->decimal('debit' , 8 , 2)->nullable() ;
            $table->decimal('credit' , 8 , 2)->nullable() ;
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
        Schema::dropIfExists('funt_accounts');
    }
};
