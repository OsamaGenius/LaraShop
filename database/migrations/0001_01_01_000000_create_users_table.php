<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('file')->default('profiles/KhADgoC0wJUKQChQHiRhVQPfAKdopcu85UROhLVY.jpg');
            $table->string('name')->nullable()->default('')->description('User real name');
            $table->string('username')->unique()->nullable()->description('For login and show to the users');
            $table->string('email')->unique()->description('For login and email system also password reset');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('group_id')->default(0)->description('Shows if the current user is Admin or not');
            $table->integer('approvent')->default(0)->description('User Status that prevent or allow him from accessing the system');
            $table->string('resetToken')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
