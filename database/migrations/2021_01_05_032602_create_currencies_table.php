<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCurrenciesTable extends Migration {

	public function up()
	{
		Schema::create('currencies', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name', 100);
			$table->string('symbol', 100);
			$table->string('exchange_rate', 100);
			$table->integer('status')->default('0');
			$table->string('code', 20);
		});
	}

	public function down()
	{
		Schema::drop('currencies');
	}
}