<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index();

            $table->unsignedBigInteger('device_id')->index();

            $table->index(['user_id','device_id']);

            $table->string('name')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->timestamp('reported_as_rogue_at')->nullable()->index();
            $table->text('note')->nullable();
            $table->text('admin_note')->nullable();
            $table->json('data')->nullable();

            $table->foreign('device_id')->references('id')->on('devices')->cascadeOnDelete();

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
        Schema::dropIfExists('device_user');
    }
}
