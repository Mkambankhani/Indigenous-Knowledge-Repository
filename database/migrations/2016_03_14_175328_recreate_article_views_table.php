<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecreateArticleViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('article_views');
        Schema::create('article__views', function (Blueprint $table) {
            $table->increments('article_views_id');
            $table->integer('article_id',false,true)->length(11);
            $table->integer('cat_id',false,true)->length(11);
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
        Schema::drop('article__views');
        Schema::create('article_views', function (Blueprint $table) {
            $table->increments('article_views_id');
            $table->integer('article_id',false,true)->length(11);
            $table->timestamps();
            $table->integer('cat_id',false,true)->length(11);
        });
    }
}
