<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{

    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->string('title');
            $table->mediumText('content');
            $table->string('image');
            $table->string('cover_image');
            $table->string('slug');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('projects');
    }
}
