<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::connection('tenant')->create(
            'chat_files',
            function (Blueprint $table) {
                $table->id();
                $table->integer('chat_id')->index();
                $table->integer('message_id')->index();
                $table->string('path')->nullable();;
                $table->string('filename')->nullable();
                $table->timestamps();
            }
        );
    }

    public function down(): void
    {
        Schema::connection('tenant')->dropIfExists('chat_files');
    }
};
