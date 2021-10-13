<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateGeoThreeWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('geo_three_words',function (Blueprint $table){
            $table->softDeletes();
            $table->index(['latitude']);
            $table->index(['longitude']);
            $table->index(['created_at']);
            $table->index(['updated_at']);
            $table->index(['deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('geo_three_words',function (Blueprint $table){
            $table->dropIndex(['latitude']);
            $table->dropIndex(['longitude']);
            $table->dropIndex(['created_at']);
            $table->dropIndex(['updated_at']);
            $table->dropIndex(['deleted_at']);
            $table->dropColumn(['deleted_at']);
        });
    }
}
