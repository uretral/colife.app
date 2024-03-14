<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::connection('tenant')->create('translations', function (Blueprint $table) {
            $table->id();
            $table->string('page');
            $table->string('description');
            $table->json('translation');

/*            $table->string('entity');
            $table->string('entity_title');
            $table->string('ru')->nullable();
            $table->string('en')->nullable();*/
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::connection('tenant')->dropIfExists('translations');
    }
};
