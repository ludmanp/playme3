<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBroadcastsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('broadcasts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('image_id')->nullable()->constrained('files')->nullOnDelete();
            $table->string('status', 100)->default('new');
            $table->string('lang')->nullable();
            $table->string('title')->nullable();
            $table->text('summary')->nullable();
            $table->string('external_id',  36)->nullable();

// addresses
// dates
            $table->string('contact_name')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('leader_name')->nullable();
            $table->string('leader_phone')->nullable();
            $table->string('leader_email')->nullable();

            $table->string('company')->nullable();
            $table->string('registration_nr')->nullable();
            $table->string('legal_address')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('company_email')->nullable();

            $table->boolean('is_public')->default(0);

            $table->json('parameters')->default(new Expression('(JSON_OBJECT())'));

            $table->text('embed_script')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('broadcast_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('broadcast_id')->constrained()->onDelete('cascade');
            $table->unsignedInteger('position')->nullable();
            $table->string('address');
            $table->timestamps();
        });

        Schema::create('broadcast_dates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('broadcast_id')->constrained()->onDelete('cascade');
            $table->unsignedInteger('position')->nullable();
            $table->dateTime('starts_at');
            $table->dateTime('arrive_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('broadcast_dates');
        Schema::drop('broadcast_addresses');
        Schema::drop('broadcasts');
    }
}
