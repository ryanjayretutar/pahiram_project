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
            $table->increments('id');
            $table->unsignedInteger('invoice_detail_id');
            $table->string('customer_name', 100);
            $table->date('order_date');
            $table->double('sub_total',8,2); 
            $table->double('grand_subtotal',8,2);
            $table->double('discount',8,2); 
            $table->double('net_total',8,2); 
            $table->double('paid',8,2); 
            $table->double('due',8,2);
            $table->text('payment_type'); 
            $table->foreign('invoice_detail_id')->references('id')->on('invoice_details')->onDelete('restrict')->onUpdate('cascade');
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
