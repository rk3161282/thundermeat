<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRolesTable extends Migration {

	public function up()
	{
		Schema::create('roles', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name', 255)->unique();
			$table->string('displayname', 255);
			$table->string('description', 255)->nullable();
			$table->integer('permissions')->unsigned()->index();
			$table->tinyInteger('status')->default('1');
		});
	}

	public function down()
	{
		Schema::drop('roles');
	}
}