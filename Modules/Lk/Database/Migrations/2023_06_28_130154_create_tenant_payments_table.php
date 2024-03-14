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
        Schema::connection('tenant')->create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('purpose_id');
            $table->integer('status_id');
            $table->integer('amount');
            $table->string('description')->nullable();
            $table->dateTime('deadline');
            $table->dateTime('payed_at');
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
        Schema::dropIfExists('payments');
    }
};
