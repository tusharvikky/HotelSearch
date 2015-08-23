<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRoomType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_types', function ($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->text('address');
            $table->string('city');
            $table->text('description');
            $table->float('base_price');
            $table->string('room_type');
            $table->float('rating');
            $table->integer('max_occupancy');
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
        Schema::drop('room_types');
    }
}
