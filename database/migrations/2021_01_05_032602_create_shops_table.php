<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShopsTable extends Migration {

	public function up()
	{
		Schema::create('shops', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('store_name', 255);
			$table->string('store_manager', 255);
			$table->string('store_phone', 255);
			$table->string('sector', 255);
			$table->string('bussiness_address', 255);
			$table->string('bussiness_condition', 255);
			$table->string('store_image', 255);
			$table->string('password', 255);
			$table->integer('delivery_radius')->nullable();
			$table->string('logo', 255)->nullable();
			$table->string('facebook', 255)->nullable();
			$table->string('google', 255)->nullable();
			$table->string('twitter', 255)->nullable();
			$table->string('youtube', 255)->nullable();
			$table->integer('user_id')->unsigned()->index();
			$table->mediumText('about_shop')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('shops');
	}
}