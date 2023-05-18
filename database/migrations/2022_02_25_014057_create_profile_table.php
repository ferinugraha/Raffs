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
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            
            $table->string('image')->nullable();
            $table->string('title_image')->nullable();
            $table->string('title')->nullable();

            $table->string('img_homemenu')->nullable();
            $table->string('cover_img_homemenu')->nullable();
            $table->string('title_homemenu')->nullable();
            $table->text('description_homemenu')->nullable();

            $table->string('img_navbar')->nullable();
            $table->string('title_navbar')->nullable();
            $table->text('title_description')->nullable();

            $table->time('time_open')->nullable();
            $table->time('time_close')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('address')->nullable();

            $table->string('img_big')->nullable();
            $table->string('title_big')->nullable();
            $table->text('description_big')->nullable();

            $table->string('img_left')->nullable();
            $table->string('title_left')->nullable();
            $table->text('description_left')->nullable();

            $table->string('img_center')->nullable();
            $table->string('title_center')->nullable();
            $table->text('description_center')->nullable();

            $table->string('img_right')->nullable();
            $table->string('title_right')->nullable();
            $table->text('description_right')->nullable();

            $table->string('data_id');

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
        Schema::dropIfExists('profile');
    }
};
