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
            $table->string('id', 21)->primary();
            $table->string('name')->nullable();
            $table->string('username')->unique();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->integer('place_birth')->nullable();
            $table->date('date_birth')->nullable();
            $table->string('sex')->nullable();
            $table->integer('id_role')->default(1);
            $table->string('role_name')->nullable();
            $table->integer('id_position')->default(1);
            $table->string('position_name')->nullable();
            $table->integer('is_active')->default(1);
            $table->integer('id_periode')->default(0);
            $table->string('is_first_login')->default('Y');
            $table->integer('count_error_login')->default(0);
            $table->string('bg_color')->nullable();
            $table->string('forgot_passcode')->nullable();
            $table->datetime('forgot_passcode_valid_to')->nullable();
            $table->rememberToken();
            $table->softDeletes();
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
