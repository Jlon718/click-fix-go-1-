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
        Schema::create('tickets', function (Blueprint $table) {
            $table->unsignedBigInteger('queue_id')->index();
            $table->foreign('queue_id')->references('queue_id')->on('queues')->onDelete('cascade');
            $table->unsignedBigInteger('customer_id')->index();
            $table->foreign('customer_id')->references('customer_id')->on('customers')->onDelete('cascade');
            $table->string('customer_name');
            $table->unsignedBigInteger('device_id')->index();
            $table->foreign('device_id')->references('device_id')->on('devices')->onDelete('cascade');
            $table->string('device_type');
            $table->unsignedBigInteger('service_id')->index();
            $table->foreign('service_id')->references('service_id')->on('services')->onDelete('cascade');
            $table->string('service_type');
            $table->unsignedBigInteger('technician_id')->nullable()->index();
            $table->foreign('technician_id')->references('technician_id')->on('technicians')->onDelete('cascade');
            $table->string('technician_name')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
