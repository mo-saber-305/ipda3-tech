<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->string('name');
            $table->string('image');
			$table->timestamps();

		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}
