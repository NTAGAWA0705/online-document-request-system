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
        Schema::create('generated_docs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('student_request_document_id')->constrained()->onDelete('cascade');
            $table->string('doc_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('generated_docs');
    }
};
