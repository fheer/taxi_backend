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
        Schema::create('cab', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Model', 45)->nullable();
            $table->string('LicensePlate', 10)->unique();
            $table->string('CarChassis', 25)->unique();
            $table->string('Color', 20)->nullable();
            $table->string('Left', 100)->nullable();
            $table->string('Right', 100)->nullable();
            $table->string('Front', 100)->nullable();
            $table->string('Back', 100)->nullable();
            $table->string('Up', 100)->nullable();
            $table->bigInteger('CarBandId')->nullable();
            $table->bigInteger('CompanyId')->nullable();
            $table->bigInteger('PersonId')->nullable();
            $table->foreign('CarBandId')->references('id')->on('carbrand')->onDelete('cascade');
            $table->foreign('CompanyId')->references('id')->on('company')->onDelete('cascade');
            $table->foreign('PersonId')->references('id')->on('person')->onDelete('cascade');
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
        Schema::dropIfExists('cab');
    }
};
