<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeammembersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('teammembers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('image_id')->nullable()->constrained('files')->nullOnDelete();
            $table->json('status')->default(new Expression('(JSON_OBJECT())'));
            $table->json('name')->default(new Expression('(JSON_OBJECT())'));
            $table->json('title')->default(new Expression('(JSON_OBJECT())'));
            $table->json('slug')->default(new Expression('(JSON_OBJECT())'));
            $table->json('body')->default(new Expression('(JSON_OBJECT())'));
            $table->foreignId('signature_image_id')->nullable()->constrained('files')->nullOnDelete();
            $table->integer('position')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('teammembers');
    }
}
