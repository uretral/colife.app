<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::connection('my')->create('contacts', function (Blueprint $table) {
            $table->id();
            $table->integer('order')->default(500);
            $table->integer('active')->default(1);
            $table->string('user_id');
            $table->string('name');
            $table->string('phone');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::connection('my')->dropIfExists('contacts');
    }
};
