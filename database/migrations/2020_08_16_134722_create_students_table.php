<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('birthday')->nullable();
            $table->string('address')->nullable();
            $table->integer('grade_id')->nullable();
            $table->string('last_school')->nullable();
            $table->string('last_grade')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('phone')->nullable();
            $table->string('parent1_first')->nullable();
            $table->string('parent1_last')->nullable();
            $table->string('parent1_phone')->nullable();
            $table->string('parent2_first')->nullable();
            $table->string('parent2_last')->nullable();
            $table->string('parent2_phone')->nullable();          
            $table->integer('classes_id')->nullable();
            $table->string('course_name')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('payment')->nullable();
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
