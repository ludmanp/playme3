<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('image_id')->nullable()->constrained('files')->nullOnDelete();
            $table->json('status')->default(new Expression('(JSON_OBJECT())'));
            $table->timestamp('published_at');
            $table->json('title')->default(new Expression('(JSON_OBJECT())'));
            $table->json('slug')->default(new Expression('(JSON_OBJECT())'));
            $table->foreignId('category_id')->nullable()->constrained('blogcategories');
            $table->json('summary')->default(new Expression('(JSON_OBJECT())'));
            $table->json('body')->default(new Expression('(JSON_OBJECT())'));
            $table->foreignId('author_id')->nullable()->constrained('authors');
            $table->json('location')->default(new Expression('(JSON_OBJECT())'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
