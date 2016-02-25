<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this -> call('StudentTableSeeder');
        $this -> command->info('Student Table Seeded!')

        //Model::reguard();
    }

    }

    class StudentTableSeeder extends Seeder {
    public function run()
    {
        DB::table('student') -> delete();
        DB::table('student') -> insert([
            'student_id' => '550510618',
            'name_title' => 'นางสาว',
            'firstname'  => 'วริษฐา',
            'lastname'   => 'ปิมปา',
            'year'       => '2555' ,
            'year_reg'   => '2558',
            'semester_ge'=> '1',
            'p_status'  =>  '0'
            ]);
    }
    }

