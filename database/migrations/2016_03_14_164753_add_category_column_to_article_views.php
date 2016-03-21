<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryColumnToArticleViews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('article_views', function (Blueprint $table) {
            //Adding category article visits
              $table->integer('cat_id',false,true)->length(11);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article_views', function (Blueprint $table) {
            //Drop category in column in the 
             $table->dropColumn('cat_id');
        });
    }
}
