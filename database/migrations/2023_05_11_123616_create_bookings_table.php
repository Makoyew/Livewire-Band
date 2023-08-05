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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('eventname', 50);
            $table->string('eventlocation', 50);
            $table->string('eventdescription', 500);
            $table->date('eventdate');
            $table->time('timestart')->nullable();
            $table->time('timeend')->nullable();
            $table->string('status')->default('Pending');
            $table->unsignedBigInteger('musicband_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('musicband_id')->references('id')->on('musicbands');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
