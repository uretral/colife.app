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
        Schema::connection('my')->create('expenses', function (Blueprint $table) {
            $table->id();
            $table->integer('order');
            $table->integer('active');
            $table->string('slug');
            $table->string('color');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('my')->dropIfExists('expenses');
    }
};
