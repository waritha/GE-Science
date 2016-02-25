<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Admin',function(Blueprint $table)
        {
        $table -> increments('admin_id'); 
        $table -> string('first_name' , 30); 
        $table -> string('last_name' , 30); 
        $table -> string('username' , 30); 
        $table -> string('password' , 30); 
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
