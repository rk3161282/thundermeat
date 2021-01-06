<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFaqsTable extends Migration {

	public function up()
	{
		Schema::create('faqs', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('shop_id')->unsigned()->index();
			$table->string('title', 255);
			$table->mediumText('description');
			$table->tinyInteger('status')->default('1');
		});
	}

	public function down()
	{
		Schema::drop('faqs');
	}
}