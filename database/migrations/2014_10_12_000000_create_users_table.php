<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->bigInteger('role')->nullable();
            $table->string('phone')->unique();
            $table->string('user_code')->nullable();
            $table->integer('app_user')->default(0);
            $table->string('user_phone1')->nullable();
            $table->string('user_name1')->nullable();
            $table->string('user_designation1')->nullable();
            $table->string('user_phone2')->nullable();
            $table->string('user_name2')->nullable();
            $table->string('user_designation2')->nullable();
            $table->string('company')->nullable();
            $table->string('unit_name')->nullable();
            $table->string('user_ip')->nullable();
            $table->string('image')->nullable();
            $table->string('unit_worker_code')->nullable();
            $table->string('unit_password')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
