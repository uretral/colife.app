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
        Schema::connection('tenant')
            ->create(
                'users',
                function (Blueprint $table) {
                    $table->id();
                    $table->integer('bx_id')->nullable();
                    $table->string('locale');
                    $table->string('name');
                    $table->string('email')->unique();
                    $table->timestamp('email_verified_at')->nullable();
                    $table->string('password');
                    $table->rememberToken();
                    $table->timestamps();
                    $table->string('delete_reason')->nullable();
                    $table->timestamp('deleted_at')->nullable();
                }
            );

        Schema::connection('tenant')
            ->create(
                'user_attributes',
                function (Blueprint $table) {
                    $table->bigIncrements('id')->unsigned();
                    $table->integer('user_id');
                    $table->string('phone', 12)->nullable();
                    $table->boolean('phone_verified')->nullable();
                    $table->string('last_name')->comment('Фамилия')->nullable();
                    $table->string('surname')->comment('Отчество')->nullable();
                    $table->date('bod')->comment('Дата рождения')->nullable();
                    $table->string('job')->nullable();
                    $table->json('interests')->nullable();
                    $table->string('telegram')->nullable();
                    $table->string('facebook')->nullable();
                    $table->boolean('save_data')->default(true)->nullable();
                    $table->boolean('location')->default(null)->nullable();
                    $table->boolean('test_user')->nullable();
                    $table->integer('bonus')->nullable();
                    $table->integer('cleaning')->nullable();
                    $table->integer('master')->nullable();
                    $table->boolean('email_notification')->nullable();
                    $table->boolean('sms_notification')->nullable();
                    $table->timestamps();
                    $table->dateTime('deleted_at')->nullable();
                }
            );

        Schema::connection('tenant')
            ->create('user_chat_attributes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('bx_chat_user_id')->unsigned()->nullable()->index();
            $table->integer('bx_private_chat_id')->unsigned()->nullable()->index();
            $table->integer('bx_group_chat_id')->unsigned()->nullable()->index();
            $table->string('img')->nullable();
            $table->string('title')->nullable();
            $table->string('initials')->nullable();
            $table->string('color')->nullable();
            $table->string('bg')->nullable();
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
        Schema::connection('tenant')
            ->dropIfExists('users');

        Schema::connection('tenant')
            ->dropIfExists('user_attributes');

        Schema::connection('tenant')
            ->dropIfExists('user_chat_attributes');
    }
};
