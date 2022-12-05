<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('facts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('image_id')->nullable()->constrained('files')->nullOnDelete();
            $table->json('status')->default(new Expression('(JSON_OBJECT())'));
            $table->integer('number')->nullable();
            $table->json('title')->default(new Expression('(JSON_OBJECT())'));
            $table->json('link')->default(new Expression('(JSON_OBJECT())'));
            $table->json('link_title')->default(new Expression('(JSON_OBJECT())'));
            $table->integer('position')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('facts');
    }
}
