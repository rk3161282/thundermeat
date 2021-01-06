<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoupenListsTable extends Migration {

	public function up()
	{
		Schema::create('coupenLists', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('code', 255);
			$table->enum('type', array('Flat', 'Percentage'));
			$table->tinyInteger('status');
			$table->integer('shop_id')->unsigned()->index();
			$table->string('details', 255);
			$table->double('discount');
			$table->string('discount_type', 255);
			$table->date('start_date');
			$table->date('end_date');
		});
	}

	public function down()
	{
		Schema::drop('coupenLists');
	}
}