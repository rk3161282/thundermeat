<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePermissionsTable extends Migration {

	public function up()
	{
		Schema::create('permissions', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name', 255)->unique();
			$table->string('displayname', 255);
			$table->string('description', 255);
			$table->tinyInteger('status')->default('1');
		});
	}

	public function down()
	{
		Schema::drop('permissions');
	}
}