<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyInsightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_insights', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('graph_instagram_id');
            $table->string('reach');
            $table->string('impressions');
            $table->string('profile_views');
            $table->string('end_time');
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
        Schema::dropIfExists('daily_insights');
    }
}
