<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReviewsTable extends Migration {

	public function up()
	{
		Schema::create('reviews', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('shop_id')->unsigned()->index();
			$table->integer('user_id');
			$table->string('comment', 255)->nullable();
			$table->integer('status')->default('1');
			$table->integer('viewed')->default('0');
		});
	}

	public function down()
	{
		Schema::drop('reviews');
	}
}