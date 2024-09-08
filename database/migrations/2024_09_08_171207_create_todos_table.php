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

        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });

        Schema::create('todos', function (Blueprint $table) {
            $table->id(); // id todo
            // yang ni akan merujuk kepada id dalam table statuses yang akan menetukan dia dalam status a
            $table->foreignId('status_id')->constrained('statuses')->onDelete('cascade');
            $table->string('title'); // nama todo
            $table->text('description')->nullable(); // nullable can be used here to set it to null
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
        Schema::dropIfExists('statuses');
    }
};
