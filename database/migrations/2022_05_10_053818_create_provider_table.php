<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('role');
            $table->string('username', 50)->unique()->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile');
            $table->string('password');
            $table->tinyInteger('image')->nullable();
            $table->decimal('latitude', 10, 2)->nullable();
            $table->decimal('longitude', 10, 2)->nullable();
            $table->tinyInteger('country')->nullable();
            $table->tinyInteger('state')->nullable();
            $table->tinyInteger('city')->nullable();
            $table->string('area')->nullable();
            $table->string('address')->nullable();
            $table->timestamp('notify_status')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->tinyInteger('block')->default(1);
            $table->tinyInteger('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('providers');
    }
}
