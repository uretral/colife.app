<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('tenant')->create('payment_purposes', function (Blueprint $table) {
            $table->id();
            $table->integer('order');
            $table->integer('active')->default(1);
            $table->string('title');
            $table->string('color');
            $table->string('bg');
            $table->string('icon_filter')->nullable();
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
        Schema::dropIfExists('payment_purposes');
    }
};
