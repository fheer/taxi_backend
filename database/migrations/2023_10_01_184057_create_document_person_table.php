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
        Schema::create('document_person', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('document_id')->nullable();
            $table->bigInteger('person_id')->nullable();
            $table->foreign('document_id')->references('id')->on('document')->onDelete('cascade');
            $table->foreign('person_id')->references('id')->on('person')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('document_person');
    }
};
