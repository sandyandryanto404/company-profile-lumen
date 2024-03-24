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
            $table->bigIncrements('id');
            $table->string('image', 255)->nullable()->index();
            $table->string('first_name', 64)->nullable()->index();
            $table->string('last_name', 64)->nullable()->index();
            $table->string('gender', 2)->nullable()->index();
            $table->string('country', 191)->nullable()->index();
            $table->text('address')->nullable();
            $table->text('about_me')->nullable();
            $table->string('username', 255)->unique();
            $table->string('email', 255)->unique();
            $table->string('password', 255)->index();
            $table->string('phone', 64)->nullable()->unique();
            $table->tinyInteger('status')->default(1)->index();
            $table->rememberToken();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 64)->unique();
            $table->string('name', 64)->unique();
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default(1)->index();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('users_roles', function (Blueprint $table) {
           $table->unsignedBigInteger('user_id')->index();
           $table->unsignedBigInteger('role_id')->index();
           $table->primary(['user_id', 'role_id']);
           $table->foreign('user_id')->references('id')->on('users')->onDelete('no action')->onUpdate('no action');
           $table->foreign('role_id')->references('id')->on('roles')->onDelete('no action')->onUpdate('no action');
           $table->engine = 'InnoDB';
        });

        Schema::create('users_verifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index();
            $table->string('token', 255)->index();
            $table->tinyInteger('status')->default(1)->index();
            $table->dateTime('expired_at')->nullable()->index();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action')->onUpdate('no action');
            $table->engine = 'InnoDB';
        });

        Schema::create('users_notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index();
            $table->string('subject', 191)->nullable()->index();
            $table->string('description', 255)->nullable()->index();
            $table->longtext('content')->nullable();
            $table->tinyInteger('status')->default(0)->index();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action')->onUpdate('no action');
            $table->engine = 'InnoDB';
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email', 255)->index();
            $table->string('token', 255)->index();
            $table->timestamp('created_at')->nullable()->index();
            $table->engine = 'InnoDB';
        });

        Schema::create('login_attempts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip_address', 45)->index();
            $table->string('login', 45)->index();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('login_attempts');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('users_notifications');
        Schema::dropIfExists('users_verifications');
        Schema::dropIfExists('users_roles');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('users');
    }
};
