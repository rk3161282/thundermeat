<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('role')->references('id')->on('roles')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('roles', function(Blueprint $table) {
			$table->foreign('permissions')->references('id')->on('permissions')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('categories', function(Blueprint $table) {
			$table->foreign('shop_id')->references('id')->on('shops')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('coupenLists', function(Blueprint $table) {
			$table->foreign('shop_id')->references('id')->on('shops')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('banners', function(Blueprint $table) {
			$table->foreign('shop_id')->references('id')->on('shops')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('requests', function(Blueprint $table) {
			$table->foreign('shop_id')->references('id')->on('shops')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('notifications', function(Blueprint $table) {
			$table->foreign('shop_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('bankDetails', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('shops', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('meats', function(Blueprint $table) {
			$table->foreign('shop_id')->references('id')->on('shops')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('meats', function(Blueprint $table) {
			$table->foreign('cat_id')->references('id')->on('categories')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('meats', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('shopnews', function(Blueprint $table) {
			$table->foreign('shop_id')->references('id')->on('shops')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('shopAvailableTime', function(Blueprint $table) {
			$table->foreign('shop_id')->references('id')->on('shops')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('order_details', function(Blueprint $table) {
			$table->foreign('order_id')->references('id')->on('orders')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('order_details', function(Blueprint $table) {
			$table->foreign('shop_id')->references('id')->on('shops')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('order_details', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('meats')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('reviews', function(Blueprint $table) {
			$table->foreign('shop_id')->references('id')->on('shops')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('faqs', function(Blueprint $table) {
			$table->foreign('shop_id')->references('id')->on('shops')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('ratings', function(Blueprint $table) {
			$table->foreign('shop_id')->references('id')->on('shops')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('ratings', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_role_foreign');
		});
		Schema::table('roles', function(Blueprint $table) {
			$table->dropForeign('roles_permissions_foreign');
		});
		Schema::table('categories', function(Blueprint $table) {
			$table->dropForeign('categories_shop_id_foreign');
		});
		Schema::table('coupenLists', function(Blueprint $table) {
			$table->dropForeign('coupenLists_shop_id_foreign');
		});
		Schema::table('banners', function(Blueprint $table) {
			$table->dropForeign('banners_shop_id_foreign');
		});
		Schema::table('requests', function(Blueprint $table) {
			$table->dropForeign('requests_shop_id_foreign');
		});
		Schema::table('notifications', function(Blueprint $table) {
			$table->dropForeign('notifications_shop_id_foreign');
		});
		Schema::table('bankDetails', function(Blueprint $table) {
			$table->dropForeign('bankDetails_user_id_foreign');
		});
		Schema::table('shops', function(Blueprint $table) {
			$table->dropForeign('shops_user_id_foreign');
		});
		Schema::table('meats', function(Blueprint $table) {
			$table->dropForeign('meats_shop_id_foreign');
		});
		Schema::table('meats', function(Blueprint $table) {
			$table->dropForeign('meats_cat_id_foreign');
		});
		Schema::table('meats', function(Blueprint $table) {
			$table->dropForeign('meats_user_id_foreign');
		});
		Schema::table('shopnews', function(Blueprint $table) {
			$table->dropForeign('shopnews_shop_id_foreign');
		});
		Schema::table('shopAvailableTime', function(Blueprint $table) {
			$table->dropForeign('shopAvailableTime_shop_id_foreign');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->dropForeign('orders_user_id_foreign');
		});
		Schema::table('order_details', function(Blueprint $table) {
			$table->dropForeign('order_details_order_id_foreign');
		});
		Schema::table('order_details', function(Blueprint $table) {
			$table->dropForeign('order_details_shop_id_foreign');
		});
		Schema::table('order_details', function(Blueprint $table) {
			$table->dropForeign('order_details_product_id_foreign');
		});
		Schema::table('reviews', function(Blueprint $table) {
			$table->dropForeign('reviews_shop_id_foreign');
		});
		Schema::table('faqs', function(Blueprint $table) {
			$table->dropForeign('faqs_shop_id_foreign');
		});
		Schema::table('ratings', function(Blueprint $table) {
			$table->dropForeign('ratings_shop_id_foreign');
		});
		Schema::table('ratings', function(Blueprint $table) {
			$table->dropForeign('ratings_user_id_foreign');
		});
	}
}