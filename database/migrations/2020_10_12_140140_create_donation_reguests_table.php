<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationReguestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_reguests', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('age');
			$table->string('hospital_address');
			$table->string('phone');
			$table->text('notes');
			$table->integer('bags_num');
			$table->decimal('latitude', 10,8);
			$table->decimal('longitude', 10,8);
			$table->timestamps();
			$table->integer('client_id')->unsigned();
			$table->integer('city_id')->unsigned();
			$table->integer('blood_type_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('donation_reguests');
	}
}