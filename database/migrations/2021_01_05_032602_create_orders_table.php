<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->unsigned()->index();
			$table->string('shipping_address', 255)->nullable();
			$table->string('payment_type', 255)->nullable();
			$table->string('payment_status', 255)->default('unpaid');
			$table->mediumText('payment_details')->nullable();
			$table->double('grand_total')->default('0.00');
			$table->double('coupon_discount')->default('0.00');
			$table->string('code')->nullable();
			$table->date('date');
			$table->tinyInteger('viewed')->nullable()->default('0');
			$table->tinyInteger('delivery_viewed')->default('0');
			$table->tinyInteger('payment_status_viewed')->default('0');
			$table->tinyInteger('commission_calculated')->default('0');
		});
	}

	public function down()
	{
		Schema::drop('orders');
	}
}