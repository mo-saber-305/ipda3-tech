<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration {

	public function up()
	{
		Schema::create('pages', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->string('title');
            $table->mediumText('content');
            $table->string('image');
            $table->boolean('show_in_menu');
            $table->string('slug');
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('pages');
	}
}
