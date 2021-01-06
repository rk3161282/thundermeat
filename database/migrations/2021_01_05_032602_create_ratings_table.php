<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRatingsTable extends Migration {

	public function up()
	{
		Schema::create('ratings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('shop_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('rating');
		});
	}

	public function down()
	{
		Schema::drop('ratings');
	}
}