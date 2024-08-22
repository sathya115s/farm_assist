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
        Schema::create('crops', function (Blueprint $table) {
            $table->id();
            $table->string('crop_name');
            $table->enum('soil_type', ['Heavy', 'Medium', 'Light']);
            $table->enum('planting_type', ['Seeding', 'Transplanting']);
            $table->string('activity');
            $table->integer('activity_start_days');
            $table->integer('activity_end_days');
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
        Schema::dropIfExists('crops');
    }
};
