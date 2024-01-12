<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cadi_userlogs', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('action_done');
            $table->date('date_done');
            $table->time('time_done');
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
        Schema::dropIfExists('cadi_userlogs');
    }
};
