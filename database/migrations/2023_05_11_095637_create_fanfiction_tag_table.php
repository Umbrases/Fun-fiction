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
        Schema::create('fanfiction_tag', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('fanfiction_id');
            $table->index('fanfiction_id', 'fanfiction_tag_fanfiction_idx');
            $table->foreign('fanfiction_id', 'fanfiction_tag_fanfiction_fk')->on('fanfictions')->references('id');


            $table->unsignedBigInteger('tag_id');
            $table->index('tag_id', 'fanfiction_tag_tag_idx');
            $table->foreign('tag_id', 'fanfiction_tag_tag_fk')->on('tags')->references('id');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fanfiction_tag');
    }
};
