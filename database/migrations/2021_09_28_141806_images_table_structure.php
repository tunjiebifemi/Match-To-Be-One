<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ImagesTableStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->string('image_url')->length(202)->change();
            $table->integer('user_id')->length(19)->unsigned()->index()
            ->foreign()->references('id')->on('users')->onDelete('cascade')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->string('image_url')->length(202)->change();
            $table->integer('user_id')->length(10)->unsigned()->index()
            ->foreign()->references('id')->on('users')->onDelete('cascade')->change();
        });
    }
}
