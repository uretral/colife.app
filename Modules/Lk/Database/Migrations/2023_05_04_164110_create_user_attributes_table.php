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
        Schema::create(
            'user_attributes',
            function (Blueprint $table) {
                $table->bigIncrements('id')->unsigned();
                $table->integer('user_id');
                $table->integer('position_id')->nullable();
                $table->string('phone', 12)->nullable();
                $table->boolean('phone_verified')->nullable();
                $table->string('surname')->comment('Фамилия')->nullable();
                $table->date('bod')->comment('Дата рождения')->nullable();
                $table->string('job')->nullable();
                $table->json('interests')->nullable();
                $table->string('telegram')->nullable();
                $table->string('facebook')->nullable();
                $table->boolean('save_data')->default(true)->nullable();
                $table->boolean('location')->default(null)->nullable();
                $table->boolean('test_user')->nullable();
                $table->timestamps();
                $table->dateTime('deleted_at')->nullable();
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
        Schema::dropIfExists('user_attributes');
    }
};
