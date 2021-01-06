<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderDetailsTable extends Migration {

	public function up()
	{
		Schema::create('order_details', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('order_id')->unsigned()->index();
			$table->integer('shop_id')->unsigned()->index();
			$table->integer('product_id')->unsigned()->index();
			$table->text('variation')->nullable();
			$table->double('price')->default('0.00');
			$table->double('tax')->default('0.00');
			$table->double('shipping_cost')->default('0.00');
			$table->integer('quantity')->default('0');
			$table->string('payment_status', 50)->nullable()->default('unpaid');
			$table->string('delivery_status', 50)->default('pending');
			$table->string('shipping_type', 50)->nullable();
			$table->string('pickup_point_id', 100)->nullable();
			$table->string('coupon_code', 100)->nullable();
			$table->string('weight', 50)->nullable();
			$table->string('size', 50)->nullable();
			$table->string('comments', 255)->nullable();
			$table->string('requests', 255)->nullable();
		});
	}

	public function down()
	{
		Schema::drop('order_details');
	}
}