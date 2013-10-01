<?php

use Illuminate\Database\Migrations\Migration;

class CreateEntrepreneurTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entrepreneurs', function($table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->boolean('is_agency');
			$table->boolean('is_company');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('sex');
			$table->string('nationality');
			$table->date('date_of_birth');
			$table->text('address1');
			$table->text('address2');
			$table->string('city');
			$table->string('country');
			$table->string('email');
			$table->string('phone');
			$table->string('fax');
			$table->string('mobile');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('entrepreneurs');
	}

}