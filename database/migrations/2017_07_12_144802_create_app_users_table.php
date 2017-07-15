<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('college');
            $table->string('year_of_graduation');
            $table->string('mobile');
            $table->string('mobile_verified');
            $table->string('email')->unique();
            $table->string('email_verified');
            $table->string('password');
            $table->string('verified');
            $table->string('verification_timestamp');
            $table->string('student');
            $table->string('alumni');
            $table->string('id_card');
            $table->string('description');
            $table->string('cur_org');
            $table->string('cur_desig');
            $table->string('cur_org_dur');
            $table->string('prev_org');
            $table->string('prev_desig');
            $table->string('prev_org_dur');
            $table->string('avatar');

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
        Schema::dropIfExists('app_users');
    }
}
