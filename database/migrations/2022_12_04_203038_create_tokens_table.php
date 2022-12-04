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
        Schema::create('tokens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('token');
            $table->datetime('created_at');
            $table->datetime('expiring_on')->nullable();
            $table->tinyInteger('can_create')->default(0);
            $table->tinyInteger('can_read')->default(1);
            $table->tinyInteger('can_update')->default(0);
            $table->tinyInteger('can_delete')->default(0);
            $table->tinyInteger('is_active')->default(1);

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tokens');
    }
};
