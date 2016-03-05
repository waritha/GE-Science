<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabase1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('admin',function(Blueprint $table)
                {
                $table -> increments('admin_id'); 
                $table -> string('first_name' , 30); 
                $table -> string('last_name' , 30); 
                $table -> string('username' , 30); 
                $table -> string('password' , 30);
                $table -> string('admin_dept' , 30);  

                });

        Schema::create('student',function(Blueprint $table)
        {
        $table -> string('student_id',10); 
        $table -> string('first_name', 30); 
        $table -> string('last_name' , 30); 
       // $table -> char('year' , 4);   delete 30-11-58
        $table -> char('year_reg' , 4); 
        $table -> char('semester_ge' , 1);
        $table -> string('p_status' , 30); 
        $table -> string('student_dept' , 30);  
        });

        Schema::create('activity',function(Blueprint $table)
        {
        $table -> integer('activity_id'); 
        $table -> char('a_year', 4); 
        $table -> string('a_name' , 50); 
        $table -> string('a_place' , 40); 
        $table -> date('start_date'); 
        $table -> date('finish_date'); 
        $table -> char('dept_id' , 3); 
        
        });

        Schema::create('participation_1',function(Blueprint $table)
        {
        $table -> string('student_id',10); 
        $table -> integer('activity_id',2);    
        $table -> string('a_status',50); 
        
        });

        Schema::create('category',function(Blueprint $table)
        {
        $table -> integer('atype_id'); 
        $table -> string('atype_name',30);
        
        });


        Schema::create('ge_activity',function(Blueprint $table)
        {
        $table -> integer('ge_id'); 
        $table -> string('ge_name' , 30); 
        $table -> string('ge_category', 30); 
        $table -> integer('ge_hour' ); 
        $table -> char('ge_year' , 4); 


        });

        Schema::create('mapping_ge_activity',function(Blueprint $table)
        {
        $table -> integer('activity_id'); 
        $table -> char('ge_id' , 3); 


        });

        Schema::create('setting_fac',function(Blueprint $table)
        {
        $table -> char('year_fac',4); 
        $table -> integer('fac_hr_act1'); 
        $table -> integer('fac_hr_act2') ; 
        $table -> integer('fac_hr_total'); 


        });

        Schema::create('setting_dept',function(Blueprint $table)
        {
        $table -> char('year_dept',4); 
        $table -> integer('dept_hr_act1'); 
        $table -> integer('dept_hr_act2'); 
        $table -> integer('dept_hr_total'); 


        });

        Schema::create('setting_club',function(Blueprint $table)
        {
        $table -> char('year_dept',4); 
        $table -> integer('club_hr'); 


        });

        Schema::create('department',function(Blueprint $table)
        {
        $table -> char('dept_id',3); 
        $table -> string('dept_name' , 30); 


        });

        Schema::create('p_status',function(Blueprint $table)
        {
        $table -> integer('p_status_id',11); 
        $table -> string('p_status_name' , 20); 


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
