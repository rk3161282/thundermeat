<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShopAvailableTimeTable extends Migration {

	public function up()
	{
		Schema::create('shopAvailableTime', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('shop_id')->unsigned()->index();
			$table->string('dayname', 255);
			$table->string('start_time', 100)->nullable();
			$table->string('end_time', 100)->nullable();
			$table->enum('off_day', array('Yes', 'No'));
		});
	}

	public function down()
	{
		Schema::drop('shopAvailableTime');
	}
}