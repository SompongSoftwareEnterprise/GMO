<?php

use Illuminate\Database\Migrations\Migration;

class CreateUploadLabTaskTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('upload_lab_task_files', function($table) {
			$table->increments('id');
			$table->integer('labtask_id')->unsigned();
			$table->string('file1');
			$table->string('file2');
			$table->string('file3');
			$table->string('file4');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('upload_lab_task_files');
	}

}
