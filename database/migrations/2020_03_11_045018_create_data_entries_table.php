<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_entries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ref_token')->nullable();
            $table->string('client_name')->nullable();
            $table->string('inst_date')->nullable();
            $table->text('desc')->nullable();
            $table->string('ben_name')->nullable();
            $table->string('ben_id')->nullable();
            $table->string('ben_phone')->nullable();
            $table->string('loc_delivery')->nullable();
            $table->string('ccy')->nullable();
            $table->string('client_ref')->nullable();
            $table->date('delivery_date')->nullable();
            $table->date('delivery_status')->nullable();
            $table->string('rate')->nullable();
            $table->string('client_inst')->nullable();
             $table->string('amount')->nullable();
            $table->string('payment_list')->nullable();
            $table->string('reviewer')->nullable();
            $table->string('checker')->nullable();
            $table->string('status')->nullable();
            $table->string('agent')->nullable();
            $table->string('comments')->nullable();
            $table->string('closuredate')->nullable();
            $table->string('deleted_at')->nullable();
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
        Schema::dropIfExists('data_entries');
    }
}
