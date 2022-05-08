<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFriendSlugToFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('friends', function (Blueprint $table) {
            $table->string('user_slug', 191)->after('user_id');
            $table->string('friend_slug', 191)->after('friend_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('friends', function (Blueprint $table) {
            //
        });
    }
}
