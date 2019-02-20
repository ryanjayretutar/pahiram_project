<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarBillingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_billing_details', function (Blueprint $table) {
            $table->increments('bill_id');
            $table->dateTime('bill_date');
            $table->string('bill_status');
            $table->double('discount_amt',10,2);
            $table->double('total_amt',10,2);
            $table->double('tax_amt',10,2);
            $table->unsignedInteger('booking_id');
            $table->double('total_late_fee',10,2);
            $table->timestamps();

            $table->foreign('booking_id')
            ->references('booking_id')
            ->on('car_booking_details')
            ->onDelete("restrict")
            ->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_billing_details');
    }
}
