<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMessageSlugToMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->string('from_slug', 100)->after('msg_from');
            $table->string('to_slug', 100)->after('msg_to');
            $table->string('is_friend', 50)->after('is_read')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            Schema::table('messages', function (Blueprint $table) {
                $table->string('from_slug', 100)->after('msg_from');
                $table->string('to_slug', 100)->after('msg_to');
                $table->string('is_friend', 50)->after('is_read')->nullable();
            });
        });
    }
}
