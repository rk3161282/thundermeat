<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('uuid', 255);
			$table->string('name', 255);
			$table->string('email', 255);
			$table->string('phone', 255);
			$table->integer('role')->unsigned()->index();
			$table->tinyInteger('status')->default('1');
			$table->string('dateofbirth', 255)->nullable();;
			$table->enum('gender', array('Male', 'Female', 'Other'))->default('Male');
			$table->string('profilePic', 255)->nullable();
			$table->string('password', 255);
			$table->string('token', 255)->nullable();
			$table->string('merchant_id', 255)->unique()->nullable();
			$table->string('corporation_name', 255)->nullable();
			$table->string('corporation_number', 255)->nullable();
			$table->string('ceo', 255)->nullable();
			$table->string('operation_certificate', 255)->nullable();
			$table->string('bussiness_number', 255)->nullable();
			$table->string('bussiness_registration', 255)->nullable();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}