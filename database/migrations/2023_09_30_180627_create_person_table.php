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
        Schema::create('person', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Ci')->unique();
            $table->string('DrivingLicense', 40)->nullable()->unique();
            $table->string('FirstName', 45);
            $table->string('LastName', 45)->nullable();
            $table->string('SecondLastName', 45)->nullable();
            $table->string('BloodType', 6)->nullable()->default('OR+');
            $table->string('CellPhone')->nullable();
            $table->string('Address', 200)->nullable();
            $table->longText('photo')->nullable();
            $table->bigInteger('CompanyId')->nullable();
            $table->foreign('CompanyId')->references('id')->on('company')->onDelete('cascade');
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
        Schema::dropIfExists('person');
    }
};
