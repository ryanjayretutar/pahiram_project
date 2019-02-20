<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemReservationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('item_reservations', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->unsigned()->index('user_id');
			$table->integer('item_id')->unsigned()->index('item_id');
			$table->dateTime('from_date');
			$table->dateTime('to_date');
			$table->float('total_cost');
			$table->float('total_discount');
			$table->string('notes', 191);
			$table->enum('status', array('Pending','Confirmed','Cancelled',''));
			$table->dateTime('return_date')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('item_reservations');
	}

}
