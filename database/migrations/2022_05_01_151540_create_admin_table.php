<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Helpers\CustomHelper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('role');
            $table->string('username',50)->unique()->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile');
            $table->string('password');
            $table->tinyInteger('image')->nullable();;
            $table->decimal('latitude', $precision = 10, $scale = 2)->nullable();;;
            $table->decimal('longitude', $precision = 10, $scale = 2)->nullable();;;
            $table->tinyInteger('country')->nullable();
            $table->tinyInteger('state')->nullable();
            $table->tinyInteger('city')->nullable();
            $table->string('area')->nullable();
            $table->string('address')->nullable();
            $table->timestamp('notify_status')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->tinyInteger('block')->default('1');
            $table->tinyInteger('status')->default('1');
        });

        DB::table('admins')->insert(
            array(
                'role' => CustomHelper::ROLE_ADMIN,
                'username' => 'mohit94x',
                'name' => 'superadmin',
                'email' => 'admin@gmail.com',
                'mobile' => 8769396605,
                'password' => Hash::make('123456789'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'block' => 0,
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
