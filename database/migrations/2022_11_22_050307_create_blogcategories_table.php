<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('blogcategories', function (Blueprint $table) {
            $table->id();
            $table->json('status')->default(new Expression('(JSON_OBJECT())'));
            $table->json('title')->default(new Expression('(JSON_OBJECT())'));
            $table->json('slug')->default(new Expression('(JSON_OBJECT())'));
            $table->integer('position')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('blogcategories');
    }
}
