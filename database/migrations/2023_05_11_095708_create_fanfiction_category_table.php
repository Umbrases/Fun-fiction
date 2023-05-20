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
        Schema::create('fanfiction_category', function (Blueprint $table) {
            $table->id();


            $table->unsignedBigInteger('fanfiction_id');
            $table->index('fanfiction_id', 'fanfiction_category_fanfiction_idx');
            $table->foreign('fanfiction_id', 'fanfiction_category_fanfiction_fk')->on('fanfictions')->references('id');


            $table->unsignedBigInteger('category_id');
            $table->index('category_id', 'fanfiction_category_category_idx');
            $table->foreign('category_id', 'fanfiction_category_category_fk')->on('categories')->references('id');



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
        Schema::dropIfExists('fanfiction_category');
    }
};
