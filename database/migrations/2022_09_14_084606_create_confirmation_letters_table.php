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
        Schema::create('confirmation_letters', function (Blueprint $table) {
            $table->id();
            $table->integer('guest_id')->nullable();
            $table->string('confirmation_no')->nullable();
            $table->date('arrival')->nullable();
            $table->date('departure')->nullable();
            $table->integer('adult')->nullable();
            $table->integer('child')->nullable();
            $table->integer('villa_id')->nullable();
            $table->string('currency')->nullable();
            $table->string('price')->nullable();
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
        Schema::dropIfExists('confirmation_letters');
    }
};
