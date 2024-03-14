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
        Schema::connection('tenant')->create(
            'chats',
            function (Blueprint $table) {
                $table->id();
                $table->string('title')->nullable();
                $table->string('icon')->nullable();
                $table->integer('is_group')->nullable();
                $table->timestamp('delivered_at')->nullable();
                $table->timestamps();
                $table->timestamp('deleted_at')->nullable();
            }
        );

        Schema::connection('tenant')->create(
            'chat_bitrix',
            function (Blueprint $table) {
                $table->id();
                $table->integer('chat_id')->index();
                $table->integer('bx_user_id')->index()->nullable();
                $table->integer('bx_chat_id')->index()->nullable();
                $table->string('bx_chat_uid')->index()->nullable();
                $table->integer('bx_deal_id')->index()->nullable();
                $table->timestamps();
            }
        );

        Schema::connection('tenant')->create(
            'chat_users',
            function (Blueprint $table) {
                $table->id();
                $table->integer('chat_id')->nullable()->index();
                $table->integer('user_id')->nullable()->index();
                $table->timestamps();
                $table->timestamp('deleted_at')->nullable();
            }
        );

        Schema::connection('tenant')->create(
            'chat_messages',
            function (Blueprint $table) {
                $table->id();
                $table->integer('chat_id')->nullable()->index();
                $table->integer('user_id')->nullable()->index();
                $table->string('message')->nullable();
                $table->integer('read')->default(0);
                $table->timestamp('delivered_at')->nullable();
                $table->timestamps();
                $table->timestamp('deleted_at')->nullable();
            }
        );

        Schema::connection('tenant')->create(
            'appeal_priority',
            function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->timestamps();
                $table->timestamp('deleted_at')->nullable();
            }
        );

        Schema::connection('tenant')->create(
            'appeal_themes',
            function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->integer('priority_id')->nullable();
                $table->timestamps();
                $table->timestamp('deleted_at')->nullable();
            }
        );

        Schema::connection('tenant')->create(
            'appeals',
            function (Blueprint $table) {
                $table->id();
                $table->integer('theme_id')->index();
                $table->integer('type_id')->index();
                $table->integer('status_id')->nullable()->default(1);
                $table->string('lastMessage')->default('');
                $table->integer('active')->default(1);
                $table->integer('score')->nullable();
                $table->timestamps();
                $table->timestamp('deleted_at')->nullable();
            }
        );

        Schema::connection('tenant')->create(
            'appeals_bitrix',
            function (Blueprint $table) {
                $table->id();
                $table->integer('appeal_id')->index();
                $table->integer('bx_user_id')->index()->nullable();
                $table->string('bx_chat_uid')->index()->nullable();
                $table->integer('bx_deal_id')->index()->nullable();
                $table->timestamps();
            }
        );

        Schema::connection('tenant')->create(
            'appeal_statuses',
            function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('color');
                $table->string('bg');
                $table->timestamps();
            }
        );

        Schema::connection('tenant')->create(
            'appeal_messages',
            function (Blueprint $table) {
                $table->id();
                $table->integer('appeal_id')->index();
                $table->integer('author_id')->index();
                $table->string('message')->nullable();
                $table->integer('bx_chat_id')->nullable()->index();
                $table->integer('bx_message_id')->nullable()->index();
                $table->boolean('read')->nullable()->index();
                $table->timestamp('delivered_at')->nullable();
                $table->timestamps();
                $table->timestamp('deleted_at')->nullable();

            }
        );

        Schema::connection('tenant')->create(
            'appeal_files',
            function (Blueprint $table) {
                $table->id();
                $table->integer('appeal_id')->index();
                $table->integer('message_id')->index();
                $table->string('path')->nullable();;
                $table->string('filename')->nullable();;
                $table->timestamps();
            }
        );

        Schema::connection('tenant')->create(
            'appeal_theme_types',
            function (Blueprint $table) {
                $table->id();
                $table->integer('theme_id')->index();
                $table->string('title');
                $table->integer('priority_id')->nullable();
                $table->timestamps();
            }
        );

        Schema::connection('tenant')->create(
            'appeal_users',
            function (Blueprint $table) {
                $table->id();
                $table->integer('appeal_id')->nullable()->index();
                $table->integer('user_id')->nullable()->index();
                $table->timestamps();
                $table->timestamp('deleted_at')->nullable();
            }
        );

        Schema::connection('tenant')->create(
            'faqs',
            function (Blueprint $table) {
                $table->id();
                $table->integer('order');
                $table->integer('active');
                $table->string('title');
                $table->timestamps();
                $table->timestamp('deleted_at')->nullable();
            }
        );

        Schema::connection('tenant')->create(
            'faq_articles',
            function (Blueprint $table) {
                $table->id();
                $table->integer('faq_id')->index();
                $table->integer('order');
                $table->integer('active');
                $table->string('title');
                $table->text('text');
                $table->timestamps();
                $table->timestamp('deleted_at')->nullable();
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
        Schema::connection('tenant')->dropIfExists('chats');
        Schema::connection('tenant')->dropIfExists('chats_bitrix');
        Schema::connection('tenant')->dropIfExists('chat_users');
        Schema::connection('tenant')->dropIfExists('chat_messages');
        Schema::connection('tenant')->dropIfExists('appeal_themes');
        Schema::connection('tenant')->dropIfExists('appeals');
        Schema::connection('tenant')->dropIfExists('appeal_bitrix');
        Schema::connection('tenant')->dropIfExists('appeal_priority');
        Schema::connection('tenant')->dropIfExists('appeal_statuses');
        Schema::connection('tenant')->dropIfExists('appeal_messages');
        Schema::connection('tenant')->dropIfExists('appeal_files');
        Schema::connection('tenant')->dropIfExists('appeal_theme_types');
        Schema::connection('tenant')->dropIfExists('appeal_users');
        Schema::connection('tenant')->dropIfExists('faqs');
        Schema::connection('tenant')->dropIfExists('faq_articles');
    }
};
