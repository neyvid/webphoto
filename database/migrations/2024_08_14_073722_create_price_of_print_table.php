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
        Schema::create('price_of_print', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('size');
            $table->integer('price');
            $table->string('printGenus')->default('paper');
            $table->string('printType');
            $table->integer('shasiTickness')->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_of_print');
    }
};
