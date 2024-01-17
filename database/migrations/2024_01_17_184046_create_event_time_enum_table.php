<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('event_time_enum', function (Blueprint $table) {
            $table->id();
            $table->foreignId("event_time")->constrained("events");
            $table->foreignId("time_id")->constrained("time_enums");
            $table->index(["time_id", "event_time"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_time_enum');
    }
};
