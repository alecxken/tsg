<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_trackings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ref_token')->nullable();
            $table->string('stage')->nullable();
            $table->string('inputer')->nullable();
            $table->string('authorizer')->nullable();
            $table->string('age')->nullable();
            $table->string('inputer_status')->nullable();
            $table->string('inputer_time')->nullable();
            $table->string('authorizer_status')->nullable();
            $table->string('authorizer_time')->nullable();
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
        Schema::dropIfExists('status_trackings');
    }
}
