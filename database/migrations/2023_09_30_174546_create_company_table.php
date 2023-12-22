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
        Schema::create('company', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Nit', 60)->nullable()->unique();
            $table->string('CompanyName', 60)->nullable()->unique();
            $table->string('OperatingLicense', 60)->nullable()->unique();
            $table->string('Address', 300)->nullable()->unique();
            $table->string('Phone', 60)->nullable()->unique();
            $table->string('logo', 100)->nullable()->unique();
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
        Schema::dropIfExists('company');
    }
};
