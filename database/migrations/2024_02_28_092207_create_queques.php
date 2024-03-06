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
        Schema::create('queues', function (Blueprint $table) {
            $table->bigIncrements('queue_id');
            $table->unsignedBigInteger('customer_id')->index();
            $table->foreign('customer_id')->references('customer_id')->on('customers')->onDelete('cascade');
            $table->string('customer_name');
            $table->date('date_placed');
            $table->date('scheduled_date');
            $table->string('phone_number')->unique();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queques');
    }
};
