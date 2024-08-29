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
        Schema::create('livestocks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('birthdate');
            $table->string('color');
            $table->string('vaccinated_date')->nullable(); // Allows NULL values
            $table->string('image')->nullable();
            $table->string('feeding_time');
            $table->string('gender');
            $table->string('vaccinated')->nullable()->default('no'); // Allows NULL values and sets default to 'no'
            $table->string('doctor_name');
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
        Schema::dropIfExists('livestocks');
    }
};
