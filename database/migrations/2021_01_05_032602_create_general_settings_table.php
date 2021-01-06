<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGeneralSettingsTable extends Migration {

	public function up()
	{
		Schema::create('general_settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('frontend_color', 255)->nullable();
			$table->string('logo', 100)->nullable();
			$table->string('admin_logo', 100)->nullable();
			$table->string('admin_login_background', 100)->nullable();
			$table->string('admin_login_sidebar', 100)->nullable();
			$table->string('favicon', 100)->nullable();
			$table->string('site_name', 100)->nullable();
			$table->string('address', 100)->nullable();
			$table->string('description', 100)->nullable();
			$table->string('phone', 100)->nullable();
			$table->string('email', 100)->nullable();
			$table->string('facebook', 100)->nullable();
			$table->string('instagram', 100)->nullable();
			$table->string('twitter', 100)->nullable();
			$table->string('youtube', 100)->nullable();
			$table->string('google_plus', 100)->nullable();
		});
	}

	public function down()
	{
		Schema::drop('general_settings');
	}
}