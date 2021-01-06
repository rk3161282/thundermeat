<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShopnewsTable extends Migration {

	public function up()
	{
		Schema::create('shopnews', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('shop_id')->unsigned()->index();
			$table->string('title', 255);
			$table->text('description');
			$table->tinyInteger('status');
		});
	}

	public function down()
	{
		Schema::drop('shopnews');
	}
}