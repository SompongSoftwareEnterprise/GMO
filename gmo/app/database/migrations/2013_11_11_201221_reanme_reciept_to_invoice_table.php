<?php

use Illuminate\Database\Migrations\Migration;

class RenameRecieptToInvoiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::rename('receipts', 'invoices');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::rename('invoices', 'receipts');
	}

}