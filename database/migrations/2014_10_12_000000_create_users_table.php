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
            // Personal Information
            $table->string('first_name');
            $table->string('name')->nullable();
            $table->integer('day_of_birth')->nullable();
            $table->integer('month_of_birth')->nullable();
            $table->integer('year_of_birth')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('avatar')->nullable();
            $table->enum('user_type',['developer', 'business_partner', 'kover', 'kover_member', 'user'])->default('kover');
            // Contact Information
            $table->string('email')->unique();
            $table->string('recovery_email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->unique();
            $table->timestamp('phone_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamp('last_logged_in_at')->nullable();
            // Connection & Security
            $table->string('password');
            $table->timestamp('password_updated_at')->nullable();
            $table->boolean('two_factor_enabled')->default(true);
            $table->string('two_factor_code')->nullable();
            $table->enum('two_factor_second_step', ['email', 'phone', 'access-key', 'authentificator', 'emergency-code'])->default('email');
            $table->dateTime('two_factor_expires_at')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('last_login_ip')->nullable();// Add a nullable string field to store the IP address from which the user last logged in

            $table->timestamps();
            $table->softDeletes();
        });

        // User Addresses
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('street')->nullable();
            $table->string('street_2')->nullable();
            $table->string('region')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('zip')->nullable();
            $table->enum('type', ['home', 'work', 'other'])->default('home');
            $table->string('loc')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });

        // User Security Notifications
        Schema::create('user_security_notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('device_id')->nullable();
            $table->timestamp('date');
            $table->string('title');
            $table->text('message')->nullable();
            $table->string('country')->nullable();
            $table->enum('type', ['confirm', 'alert', 'other'])->default('confirm');
            $table->string('device')->nullable();
            $table->string('device_icon')->nullable();
            $table->boolean('is_device')->default(false);
            $table->boolean('is_confirmed')->default(false);
            $table->boolean('is_deny')->default(false);
            $table->boolean('is_viewed')->default(false);

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });

        // User Payment Methods
        Schema::create('user_payment_methods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('type', ['credit_card', 'paypal', 'mobile'])->default('credit_card'); // e.g., 'credit_card', 'paypal', etc.
            $table->string('card_number')->nullable();
            $table->string('card_expiry_date')->nullable();
            $table->string('card_holder_name')->nullable();
            $table->string('card_cvv')->nullable();
            $table->string('paypal_email')->nullable();
            $table->string('mobile_number')->nullable();
            $table->boolean('is_default')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });


        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('user_addresses', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('user_security_notifications', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('user_payment_methods', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('failed_jobs');
    }
};
