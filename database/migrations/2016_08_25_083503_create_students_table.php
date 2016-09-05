<?php

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
            $table->string('name');
            $table->string('email');
            $table->string('tel'); //手机
            $table->string('stunum');  //学号
            $table->enum('gender',['Male','Female']);
            $table->enum('campus',['南湖校区','浑南校区']);  //校区
            $table->enum('applicant1',['播音','合成','采编']);  //第1志愿，非空
            $table->enum('applicant2',['无','播音','合成','采编']);  //第2志愿
            $table->enum('applicant3',['无','播音','合成','采编']);  //第3志愿
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
        Schema::drop('students');
    }
}
