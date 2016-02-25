<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Ge_activity',function(Blueprint $table)
        {
        $table -> integer('ge_id',2); 
        $table -> string('ge_name' , 30); 
        $table -> char('ge_category', 1); 
        $table -> integer('ge_hour' , 2); 
        $table -> char('ge_year' , 4); 


       
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
