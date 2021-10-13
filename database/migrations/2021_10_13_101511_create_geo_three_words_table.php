<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateGeoThreeWordsTable
 */
class CreateGeoThreeWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geo_three_words', function (Blueprint $table) {
            $table->id();
            $table->string('latitude')->nullable(true);
            $table->string('longitude')->nullable(true);
            $table->string('three_words');
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
        Schema::dropIfExists('geo_three_words');
    }
}
