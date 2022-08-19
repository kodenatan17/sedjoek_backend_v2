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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->string('name_full');
            $table->string('ktp');
            $table->string('ktp_address');
            $table->string('status_residence');
            $table->string('profession');
            $table->string('closest_family_phone');
            $table->string('closest_family_name');
            $table->string('closest_family_relation');
            $table->bigInteger('users_id');
            $table->string('emergency_surename');
            $table->string('emergency_address');
            $table->string('image_ktp');
            $table->string('image_kk');
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
        Schema::dropIfExists('user_details');
    }
};
