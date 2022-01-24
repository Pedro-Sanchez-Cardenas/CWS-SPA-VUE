<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoostersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boosters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('operations_id')->constrained();
            $table->foreignId('trains_id')->constrained();
            $table->double('amperage');
            $table->double('frequency');
            $table->double('px');
            $table->double('boosterFlow')->nullable();
            $table->double('boosterPressures')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boosters');
    }
}
