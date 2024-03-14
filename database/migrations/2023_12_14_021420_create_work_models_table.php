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
        Schema::connection('my')->create('work_models', function (Blueprint $table) {
            $table->id();
            $table->integer('order')->default(500);
            $table->integer('active')->default(1);
            $table->string('code');
            $table->string('title');
            $table->string('view');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('my')->dropIfExists('work_models');
    }
};
