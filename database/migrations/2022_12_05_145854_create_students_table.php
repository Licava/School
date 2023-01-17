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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
           
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('scholarship_id');
            $table->string('name')->nullable();
            $table->string('Age')->nullable();
            $table->string('Phone_Number')->nullable();
            $table->string('Address')->nullable();
            $table->string('City')->nullable();
            $table->string('Name_School')->nullable();
            $table->string('Status')->default('Pending')->nullable();
            $table->string('Parent_Name')->nullable();
            $table->string('Relationship')->nullable();
            $table->string('Grade')->nullable();
            $table->string('GWA')->nullable();
            $table->string('Parent_Income')->nullable();
            $table->timestamps();
           
           
      


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('scholarship_id')->references('id')->on('scholarships')->onDelete('cascade');
          
     
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
