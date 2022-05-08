<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CommentPostsCasd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
            $table->longText('comment')->change();
            $table->integer('user_id')->change();
            $table->integer('commentable_id')->change();
            $table->string('commentable_type')->change();
            $table->dropColumn(['parent_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
            $table->longText('comment')->change();
            $table->integer('user_id')->change();
            $table->integer('commentable_id')->change();
            $table->string('commentable_type')->change();
            $table->dropColumn(['parent_id']);
        });
    }
}
