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
            $table->string('taskler_user_name');
            $table->string('taskler_user_email')->unique();
            $table->timestamp('taskler_user_email_verified_at')->nullable();
            $table->string('taskler_user_password');
            $table->rememberToken();
            $table->timestamps('taskler_user_created_at');
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
