<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->after('avatar', function ($table){
                $table->string('work', 300)->nullable();
                $table->string('education', 300)->nullable();
                $table->string('alias', 50)->nullable();
                $table->string('bio', 300)->nullable();
                $table->string('visibility', 50)->nullable();
                $table->string('sex', 50)->nullable();
                $table->string('age', 50)->nullable();
                $table->string('location', 50)->nullable();
            });
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
            //
        });
    }
}
