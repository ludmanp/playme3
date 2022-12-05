<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tags', function (Blueprint $table) {
           $table->dropColumn(['tag', 'slug']);
        });
        Schema::table('tags', function (Blueprint $table) {
            $table->json('tag')->default(new Expression('(JSON_OBJECT())'));
            $table->json('slug')->default(new Expression('(JSON_OBJECT())'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tags', function (Blueprint $table) {
            $table->dropColumn(['tag', 'slug']);
        });
        Schema::table('tags', function (Blueprint $table) {
            $table->string('tag');
            $table->string('slug');
        });
    }
};
