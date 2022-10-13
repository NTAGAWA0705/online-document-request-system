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
        Schema::create('proof_of_payments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
            $table->unsignedBigInteger('documentrequest_id')->nullable();
            $table->foreign('documentrequest_id')->references('id')->on('documentrequests')->nullOnDelete();
            // $table->foreignId('documentrequest_id')->constrained('documentrequests', 'id')->nullOnDelete();
            $table->string('payment_slip_id')->nullable();
            $table->dateTime('payment_datetime');
            $table->float('amount');
            $table->string('method_of_payment');
            $table->string('bank_name')->nullable();
            $table->string('student_name')->nullable();
            $table->string('slip_url');
            $table->string('status')->nullable()->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proof_of_payments');
    }
};
