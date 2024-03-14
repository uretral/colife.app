<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('tenant')->table('appeal_statuses', function (Blueprint $table) {
            $table->integer('order')->default(500)->after('id');
           $table->boolean('active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('tenant')->table('appeal_statuses', function (Blueprint $table) {
            //
        });
    }
};
