<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Participation',function(Blueprint $table)
        {
        $table -> integer('student_id',10); 
        $table -> integer('activity_id',2);    
        $table -> bit('a_status1'); 
        $table -> bit('a_status2'); 
        $table -> bit('a_status3'); 
        $table -> char('join_status',1);
        
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
