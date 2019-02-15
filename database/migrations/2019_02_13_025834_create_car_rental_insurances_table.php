<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarRentalInsurancesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('car_rental_insurances', function (Blueprint $table) {
			$table->string('insurance_code')->primary();
			$table->string('insurance_name');
			$table->string('coverage_type');
			$table->double('cost_per_day',10,2);
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
		Schema::dropIfExists('car_rental_insurances');
	}
}
