<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration {

	public function up()
	{
		Schema::create('articles', function(Blueprint $table) {
			$table->increments('id');
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->string('title');
            $table->mediumText('content');
            $table->string('image');
            $table->integer('views')->default(0);
            $table->string('slug');
            $table->softDeletes();
			$table->timestamps();

		});
	}

	public function down()
	{
		Schema::drop('articles');
	}
}
