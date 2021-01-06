<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSlidersTable extends Migration {

	public function up()
	{
		Schema::create('sliders', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('photo', 255);
			$table->tinyInteger('published')->default('1');
			$table->string('link', 255)->nullable();
		});
	}

	public function down()
	{
		Schema::drop('sliders');
	}
}