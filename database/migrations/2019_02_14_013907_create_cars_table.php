<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->string('registration_number')->primary();
            $table->string('brand_name');
            $table->string('model_name');
            $table->string('model_year');
            $table->string('car_category_name');
            $table->enum('availability_status',['0','1']);
            $table->unsignedInteger('location_id');
            $table->decimal('mileage',10,2);
            $table->timestamps();

            //related categories table with items
            $table->foreign('location_id')
            ->references('location_id')
            ->on('location_details')
            ->onDelete("restrict")
            ->onUpdate("cascade");

            $table->foreign('car_category_name')
            ->references('category_name')
            ->on('car_categories')
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
        Schema::dropIfExists('cars');
    }
}
