<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBankDetailsTable extends Migration {

	public function up()
	{
		Schema::create('bankDetails', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->unsigned()->index();
			$table->string('bank_name', 255)->nullable();
			$table->string('account_number', 255)->nullable();
		});
	}

	public function down()
	{
		Schema::drop('bankDetails');
	}
}