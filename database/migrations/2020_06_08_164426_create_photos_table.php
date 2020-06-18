<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration {

	public function up()
	{
		Schema::create('photos', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('project_id')->unsigned();
            $table->string('project_images');
            $table->string('ext');
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('photos');
	}
}
