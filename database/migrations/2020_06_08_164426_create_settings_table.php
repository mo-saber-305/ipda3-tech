<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
            $table->string('header_logo');
            $table->string('footer_logo');
            $table->text('slogan');
            $table->string('intro_image');
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}
