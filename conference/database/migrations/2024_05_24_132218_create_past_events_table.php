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
        Schema::create('past_events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('tablename');
            $table->string('author');
            $table->timestamp('start_at');
            $table->integer('attendance');
            $table->string('data');
            $table->timestamp('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('past_events');
    }
};
