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
        Schema::create('student_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreignId('fee_invoice_id')->nullable()->references('id')->on('fees_invoices')->onDelete('cascade');
            $table->foreignId('recepit_id')->nullable()->references('id')->on('receipt_students')->onDelete('cascade');
            $table->foreignId('exculde_fee_id')->nullable()->references('id')->on('exculde_fees')->onDelete('cascade');
            $table->decimal('debit',8,2)->nullable();
            $table->decimal('credit',8,2)->nullable(); // it can be 00.00
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
        Schema::dropIfExists('student_accounts');
    }
};
