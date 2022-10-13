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
        Schema::create('generateddocs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('docsinrequest_id')->constrained('docsinrequest', 'id')->onDelete('cascade');
            $table->string('doc_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('generateddocs');
    }
};
