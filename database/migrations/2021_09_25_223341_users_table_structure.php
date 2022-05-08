<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersTableStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('slug', 191)->nullable();
            $table->string('avatar', 191)->nullable();
            $table->string('work', 300)->nullable();
            $table->string('education', 300)->nullable();
            $table->string('alias', 50)->nullable();
            $table->string('bio', 300)->nullable();
            $table->string('visibility', 50)->nullable();
            $table->string('sex', 50)->nullable();
            $table->string('age', 50)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('state', 50)->nullable();
            $table->tinyInteger('admin', 4)->nullable();
            $table->tinyInteger('super_admin', 4)->nullable();

        });
    }
}
