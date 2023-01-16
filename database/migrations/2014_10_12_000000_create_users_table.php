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
            $table->string('email')->unique();
            $table->string('role')->default('Student');
            $table->string('profile_image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('Address')->nullable();
            $table->string('City')->nullable();
            $table->string('Age')->nullable();
            $table->string('Phone_Number')->nullable();
            $table->string('Name_School')->nullable();
            $table->string('Grade')->nullable();
            $table->string('GWA')->nullable();
            $table->string('Parent_Name')->nullable();
            $table->string('Relationship')->nullable();
            $table->string('Parent_Income')->nullable();
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
