<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journers', function (Blueprint $table) {
            $table->increments('jou_id');
            $table->integer('user_id');
            $table->string('jou_from', 100);
            $table->string('jou_via', 100);
            $table->string('jou_to', 100);
            $table->integer('jou_seat');
            $table->dateTime('jou_start_date_time');
            $table->dateTime('jou_end_date_time')->nullable();
            $table->boolean('jou_is_fixed_time');
            $table->integer('jou_fair');
            $table->integer('jou_contact')->nullable();
            $table->string('jou_desc', 500);
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
        Schema::drop('journers');
    }
}
