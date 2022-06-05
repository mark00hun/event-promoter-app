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
        Schema::create('event_users', function (Blueprint $table) {
            $table->id('id_event_user');
            $table->foreignId('fk_id_event');
            $table->foreignId('fk_id_user');
            $table->timestamps();

            $table->foreign('fk_id_event')
                ->references('id_event')->on('events')->cascadeOnDelete();

            $table->foreign('fk_id_user')
                ->references('id_user')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_users');
    }
};
