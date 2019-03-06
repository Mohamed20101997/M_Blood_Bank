<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 100);
			$table->string('email', 100);
			$table->date('dob');
			$table->date('last_date_donation');
			$table->string('phone_number', 100);
			$table->string('password', 100);
			$table->timestamps();
			$table->string('api_token', 100)->unique()->nullable();
			$table->string('code_verify', 100)->unique()->nullable();
			$table->boolean('is_active')->default(1);
			$table->integer('city_id')->unsigned();
			$table->integer('blood_type_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}