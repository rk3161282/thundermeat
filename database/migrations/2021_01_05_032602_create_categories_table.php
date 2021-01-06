<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration {

	public function up()
	{
		Schema::create('categories', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('parent_category')->nullable();
			$table->string('name', 255);
			$table->string('slug', 255)->nullable();
			$table->string('tags', 255)->nullable();
			$table->tinyInteger('status')->default('1');
			$table->string('icon', 255)->nullable();
			$table->integer('shop_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('categories');
	}
}