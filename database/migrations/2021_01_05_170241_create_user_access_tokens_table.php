<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserAccessTokensTable extends Migration {

	public function up()
	{
		Schema::create('user_access_tokens', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('uuid', 255);
			$table->text('access_token');
			$table->string('requestor_ip_address', 255);
			$table->tinyInteger('disabled')->default('0');
			$table->datetime('last_used_at');
		});
	}

	public function down()
	{
		Schema::drop('user_access_tokens');
	}
}