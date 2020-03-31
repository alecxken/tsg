<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->string('ref_token')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('client_ref')->nullable();
            $table->string('client_name')->nullable();
            $table->string('ben_name')->nullable();
            $table->string('rate')->nullable();
            $table->string('amount')->nullable();
            $table->string('commission')->nullable();
            $table->string('disbursed')->nullable();
            $table->string('paid')->nullable();
            $table->string('pay_date')->nullable();
            $table->string('pay_inputter')->nullable();
            $table->string('pay_time')->nullable();
            $table->string('auth_inputter')->nullable();
            $table->string('auth_time')->nullable();
            $table->string('balance')->nullable();
            $table->string('invoice')->nullable();
            $table->text('desc')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
