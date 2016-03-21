<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleEditorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            //
            $table->renameColumn('author_id', 'user_id');
        });
        Schema::create('article__editors', function (Blueprint $table) {
            //Properties
             $table->increments('article_editor_id');
             $table->integer('user_id',false,true)->length(11);
             $table->integer('article_id',false,true)->length(11);
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
        Schema::drop('article__editors');
        Schema::table('articles', function (Blueprint $table) {
            //
            $table->renameColumn('user_id', 'author_id');
        });
    }
}
