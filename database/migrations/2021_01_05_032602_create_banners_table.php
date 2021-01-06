<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBannersTable extends Migration {

	public function up()
	{
		Schema::create('banners', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('image', 255);
			$table->tinyInteger('published')->default('1');
			$table->integer('shop_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('banners');
	}
}