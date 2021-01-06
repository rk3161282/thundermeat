<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLanguagesTable extends Migration {

	public function up()
	{
		Schema::create('languages', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name', 100);
			$table->string('code', 100)->nullable();
			$table->tinyInteger('rtl')->default('0');
		});
	}

	public function down()
	{
		Schema::drop('languages');
	}
}