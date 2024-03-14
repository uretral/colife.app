<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('tenant')->create('contents', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id');
            $table->string('locale');
            $table->string('model');
            $table->string('title')->nullable();
            $table->text('intro')->nullable();
            $table->text('text')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('tenant')->dropIfExists('contents');
    }
};
