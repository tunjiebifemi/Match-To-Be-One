<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PostTableStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('title')->length(191)->change();
            $table->string('image')->length(191)->change();
            $table->longText('body')->change();
            $table->string('slug')->length(205)->nullable()->change();
            $table->dropColumn(['author']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('title')->length(191)->change();
            $table->string('image')->length(191)->change();
            $table->longText('body')->change();
            $table->string('slug')->length(205)->nullable()->change();
            $table->dropColumn(['author']);
        });
    }
}
