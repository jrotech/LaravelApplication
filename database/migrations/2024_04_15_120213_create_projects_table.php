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
        Schema::create('projects', function (Blueprint $table) {
            $table->unsignedInteger('pid')->autoIncrement();
            $table->string('title', 100);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('phase', ['design', 'development', 'testing', 'deployment', 'complete'])->nullable();
            $table->string('description', 500)->nullable();
            $table->unsignedInteger('uid');
            $table->foreign('uid')->references('uid')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
