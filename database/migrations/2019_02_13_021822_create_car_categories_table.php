<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarCategoriesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('car_categories', function (Blueprint $table) {
			$table->string('category_name')->primary();
			$table->integer('no_of_luggage');
			$table->integer('no_of_person');
			$table->double('cost_per_day',10,2);
			$table->double('late_fee_per_hour',10,2);
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
		Schema::dropIfExists('car_categories');
	}
}
