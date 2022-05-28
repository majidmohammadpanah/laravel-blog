<?php

use Illuminate\Database\Migrations\Migration;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('level')->default('user',10);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('username',30)->unique();
            $table->string('password');
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('phone_number',20)->unique()->nullable();
            $table->string('job',255)->nullable();
            $table->string('about',355)->nullable();
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
};
