<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarBookingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_booking_details', function (Blueprint $table) {
                        $table->increments('booking_id');
            $table->dateTime('from_date_time');
            $table->dateTime('ret_date_time');
            $table->double('amount',10,2);
            $table->string('status');
            $table->unsignedInteger('pic_up_location');
            $table->unsignedInteger('drop_location');
            $table->string('registration_number');
            $table->unsignedInteger('user_details_id');
            $table->string('insurance_code');
            $table->dateTime('actual_return_date_time');
            $table->string('dicount_code');
            $table->timestamps();

            $table->foreign('pic_up_location')
            ->references('location_id')
            ->on('location_details')
            ->onDelete("restrict")
            ->onUpdate("cascade");

            $table->foreign('drop_location')
            ->references('location_id')
            ->on('location_details')
            ->onDelete("restrict")
            ->onUpdate("cascade");

            $table->foreign('registration_number')
            ->references('registration_number')
            ->on('cars')
            ->onDelete("restrict")
            ->onUpdate("cascade");

            $table->foreign('user_details_id')
            ->references('id')
            ->on('user_details')
            ->onDelete("restrict")
            ->onUpdate("cascade");

            $table->foreign('insurance_code')
            ->references('insurance_code')
            ->on('car_rental_insurances')
            ->onDelete("restrict")
            ->onUpdate("cascade");

            $table->foreign('dicount_code')
            ->references('discount_code')
            ->on('car_discount_details')
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
        Schema::dropIfExists('car_booking_details');
    }
}
