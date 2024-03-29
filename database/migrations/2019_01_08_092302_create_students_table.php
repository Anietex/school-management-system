<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string("first_name");
            $table->string("middle_name");
            $table->string("last_name");
            $table->string("gender");
            $table->string("blood_group");
            $table->string("grade");
            $table->string("religion");
            $table->string("email");
            $table->string("address");
            $table->string("nationality");
            $table->string("state");
            $table->string("lga");
            $table->string("password");
            $table->string("phone_no");
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
        Schema::dropIfExists('students');
    }
}
