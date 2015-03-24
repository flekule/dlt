<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTowersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Towers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('cell')->unique();
			$table->string('name');
			$table->string('latitude');
			$table->string('longitude');
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
		Schema::drop('Towers');
	}

}
