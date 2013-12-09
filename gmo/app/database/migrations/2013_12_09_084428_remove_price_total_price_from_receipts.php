<?php

use Illuminate\Database\Migrations\Migration;

class RemovePriceTotalPriceFromReceipts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('receipts', function($t) {
			$t->dropColumn('price');
			$t->dropColumn('total_price');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('receipts', function($t) {
			$t->integer('price');
			$t->integer('total_price');
		});
	}

}
