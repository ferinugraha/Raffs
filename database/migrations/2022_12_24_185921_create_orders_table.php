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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->string('name');
            $table->string('phone_number');
            $table->integer('qty');
            $table->integer('total_price');
            $table->text('kode')->nullable();
            $table->integer('no_meja')->nullable();
            $table->integer('alamat')->nullable();
            $table->integer('pajak_ppn')->nullable();
            $table->integer('total')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
