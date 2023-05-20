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
        Schema::create('fanfictions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('image')->nullable();

            $table->boolean('is_published')->default(1);

            $table->unsignedBigInteger('user_id')->nullable();
            $table->index('user_id', 'fanfiction_user_idx');
            $table->foreign('user_id', 'fanfiction_user_fk')->on('users')->references('id');



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
        Schema::dropIfExists('fanfictions');
    }
};
