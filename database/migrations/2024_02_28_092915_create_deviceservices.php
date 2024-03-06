<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('deviceservices', function (Blueprint $table) {
            $table->bigIncrements('device_service_id');
            $table->unsignedBigInteger('device_id')->index();
            $table->foreign('device_id')->references('device_id')->on('devices')->onDelete('cascade');
            $table->string('device_type');
            $table->unsignedBigInteger('service_id')->index();
            $table->foreign('service_id')->references('service_id')->on('services')->onDelete('cascade');
            $table->string('service_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deviceservices');
    }
};
