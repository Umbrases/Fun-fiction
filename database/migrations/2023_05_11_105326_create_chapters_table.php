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
        Schema::create('chapters', function (Blueprint $table) {
            $table->id()->onDelete('cascade');
            $table->string('title');
            $table->text('text');

            $table->unsignedBigInteger('fanFiction_id')->nullable();
            $table->index('fanFiction_id', 'chapter_fanFiction_idx');

            $table->foreign('fanFiction_id', 'chapter_fanFiction_fk')->on('fanfictions')->references('id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapters');
    }
};
