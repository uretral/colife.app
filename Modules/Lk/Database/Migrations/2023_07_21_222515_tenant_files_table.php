<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::connection('tenant')->create('files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('model_id');
            $table->string('model_type');

            $table->string('type')->nullable()->index();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('path')->nullable();
            $table->string('key')->nullable();
            $table->string('disk')->default("public");
            $table->string('checksum')->nullable();
            $table->string('url')->nullable();

            $table->timestamps();
            $table->timestamp("deleted_at")->nullable();

            $table->index(['model_id', 'model_type'], 'files_model_id_model_type_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('tenant')->dropIfExists(
            'files'
        );
    }
};
