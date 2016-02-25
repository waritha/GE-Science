<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Student',function(Blueprint $table)
        {
        $table -> integer('student_id',10); 
        $table -> string('name_title' , 10); 
        $table -> string('first_name', 30); 
        $table -> string('last_name' , 30); 
       // $table -> char('year' , 4);   delete 30-11-58
        $table -> string('year_reg' , 30); 
        $table -> string('semester_ge' , 30);
        $table -> string('p_status' , 30); 
        $table -> string('student_dept' , 30);  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
