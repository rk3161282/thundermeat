<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMeatsTable extends Migration {

	public function up()
	{
		Schema::create('meats', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('title', 255);
			$table->string('image', 255);
			$table->integer('stock');
			$table->double('price');
			$table->integer('thickness');
			$table->string('thickness_image', 255)->nullable();
			$table->integer('shop_id')->unsigned()->index();
			$table->integer('cat_id')->unsigned()->index();
			$table->string('sub_cat_id');
			$table->integer('user_id')->unsigned()->index();
			$table->longText('car_reference')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('meats');
	}
}