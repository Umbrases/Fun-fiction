<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fanfiction_user_likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fanfiction_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->index('fanfiction_id', 'ful_fanfiction_idx');
            $table->index('user_id', 'ful_user_idx');

            $table->foreign('fanfiction_id', 'ful_fanfiction_fk')->on('fanfictions')->references('id');
            $table->foreign('user_id', 'ful_user_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fanfiction_user_likes');
    }
};
