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
        Schema::create('docsinrequest', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('documentrequest_id')->constrained('documentrequests', 'id')->onDelete('cascade');
            $table->foreignId('doctype_id')->constrained('doctypes', 'id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docsinrequest');
    }
};
