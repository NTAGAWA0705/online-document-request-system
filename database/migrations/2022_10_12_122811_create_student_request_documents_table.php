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
        Schema::create('studentRequestDocuments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('document_request_id')->constrained('document_requests')->onDelete('set null');
            $table->foreignId('doctype_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_request_documents');
    }
};
