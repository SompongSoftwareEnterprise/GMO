<?php

use Illuminate\Database\Migrations\Migration;

class AddInvoice extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoices', function($table) {
			$table->increments('id');
			$table->string('reference_id')->unique();
			$table->integer('request_reference_id')->unsigned();
			$table->text('price');
			$table->integer('total_price')->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('invoices');
	}

}