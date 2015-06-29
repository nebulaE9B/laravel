<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotteriesAndResultAndSeriesTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lotteries', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->string('name', 200);
			$table->string('draw_time', 4)->unique();
			$table->timestamps();
		});

		Schema::create('series', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->string('code', 1);
			$table->string('numbers', 2);
			$table->timestamps();
		});

		Schema::create('result', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->dateTime('date');
			$table->bigIncrements('lottery_id')->unsigned();
			$table->foreign('lottery_id')->references('id')->on('lotteries')->onDelete('cascade');
			$table->bigIncrements('series_id')->unsigned();
			$table->foreign('series_id')->references('id')->on('series')->onDelete('cascade');
			$table->string('winning_number', 2);
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
		//
	}

}
