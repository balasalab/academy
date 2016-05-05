<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoinersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joiners', function (Blueprint $table) {
            $table->increments('joi_id');
            $table->integer('user_id');
            $table->string('joi_from', 100);
            $table->string('joi_via', 100)->nullable();
            $table->string('joi_to', 100)->nullable();
            $table->integer('joi_seat');
            $table->dateTime('joi_start_date_time');
            $table->dateTime('joi_end_date_time')->nullable();
            $table->boolean('joi_is_fixed_time');
            $table->string('joi_pic_point', 100);
            $table->integer('joi_contact')->nullable();
            $table->string('joi_desc', 200);
            $table->boolean('joi_status');
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
        Schema::drop('joiners');
    }
}
