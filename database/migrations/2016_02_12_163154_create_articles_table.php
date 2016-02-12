<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Article', function (Blueprint $table) {
            $table->increments('article_id');
            $table->string('title',100);
            $table->text('body');
            $table->string('image_url',100);
            $table->string('video_url',100);
            $table->integer('cat_id',11);
            $table->integer('author_id',11);
            $table->integer('editor_id',11);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Article');
    }
}
