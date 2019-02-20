<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToItemReservationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('item_reservations', function(Blueprint $table)
		{
			$table->foreign('user_id', 'item_reservations_ibfk_1')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('item_id', 'item_reservations_ibfk_2')->references('id')->on('items')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('item_reservations', function(Blueprint $table)
		{
			$table->dropForeign('item_reservations_ibfk_1');
			$table->dropForeign('item_reservations_ibfk_2');
		});
	}

}
