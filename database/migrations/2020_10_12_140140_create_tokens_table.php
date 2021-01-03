<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTokensTable extends Migration {

	public function up()
	{
		Schema::create('tokens', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('client_id')->unsigned();
			$table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
			$table->string('token');
			$table->enum('type',["android","ios"]);
			$table->timestamps();

		});
	}

	public function down()
	{
		Schema::drop('tokens');
	}
}
