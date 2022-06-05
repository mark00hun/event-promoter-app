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
        Schema::create('events', function (Blueprint $table) {
            $table->id('id_event');
            $table->string('name');
            $table->date('date');
            $table->string('description');
            $table->float('price');
            $table->foreignId('fk_id_location');
            $table->foreignId('fk_id_performer');
            $table->timestamps();

            $table->foreign('fk_id_location')
                ->references('id_location')->on('locations')->cascadeOnDelete();

            $table->foreign('fk_id_performer')
                ->references('id_performer')->on('performers')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
