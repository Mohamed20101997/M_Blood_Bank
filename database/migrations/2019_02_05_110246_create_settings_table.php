<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->text('about');
			$table->string('phone_number', 100);
			$table->string('email', 100);
			$table->string('android_app_ur', 255);
			$table->string('ios_app_url', 255);
			$table->string('facebook_url', 255);
			$table->string('twitter_url', 255);
			$table->string('youtube_url', 255);
			$table->string('instgram_url', 255);
			$table->string('whatsapp_url', 255);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}