<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShootingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('shootings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('status', 100)->default('new');
            $table->string('lang')->nullable();
            $table->string('title')->nullable();
            $table->text('summary')->nullable();
            $table->json('products')->default(new Expression('(JSON_OBJECT())'));
            $table->boolean('think_yourself')->default(0);

            $table->string('leader_name')->nullable();
            $table->string('leader_phone')->nullable();
            $table->string('leader_email')->nullable();
            $table->string('company')->nullable();
            $table->string('registration_nr')->nullable();
            $table->string('legal_address')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('company_email')->nullable();

            $table->json('parameters')->default(new Expression('(JSON_OBJECT())'));

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('shooting_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shooting_id')->constrained()->onDelete('cascade');
            $table->unsignedInteger('position')->nullable();
            $table->string('address');
            $table->timestamps();
        });

        Schema::create('shooting_dates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shooting_id')->constrained()->onDelete('cascade');
            $table->unsignedInteger('position')->nullable();
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('shooting_dates');
        Schema::drop('shooting_addresses');
        Schema::drop('shootings');
    }
}
