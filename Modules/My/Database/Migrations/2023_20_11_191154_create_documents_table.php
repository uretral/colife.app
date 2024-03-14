<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('my')->create(
            'documents',
            function (Blueprint $table) {
                $table->id();
                $table->string('title')->nullable();
                $table->string('description')->nullable();
                $table->string('slug')->nullable();

                $table->timestamps();
                $table->timestamp("deleted_at")->nullable();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('my')->dropIfExists(
            'documents'
        );
    }
};
