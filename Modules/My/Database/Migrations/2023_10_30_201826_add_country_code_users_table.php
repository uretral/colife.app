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
        if (!Schema::connection('my')->hasColumn('users', 'country_code')) {
            Schema::connection('my')->table(
                'users',
                function (Blueprint $table) {
                    $table->string('country_code', 10)->default(app()->getLocale())->after('bx_id')->nullable();
                }
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::connection('my')->hasColumn('users', 'country_code')) {
            Schema::connection('my')->table(
                'users',
                function (Blueprint $table) {
                    $table->dropColumn('country_code'); //drop it
                }
            );
        }
    }
};
