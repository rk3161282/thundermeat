<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRequestsTable extends Migration {

	public function up()
	{
		Schema::create('requests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('type', 255);
			$table->string('description', 255);
			$table->tinyInteger('status');
			$table->integer('shop_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('requests');
	}
}