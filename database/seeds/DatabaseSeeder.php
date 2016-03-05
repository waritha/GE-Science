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
       
        

        DB::table('p_status') -> insert([
            'p_status_id' => '1',
            'p_status_name' => 'ยังไม่ได้ประมวลผล'
            ]);
        DB::table('p_status') -> insert([
            'p_status_id' => '2',
            'p_status_name' => 'ไม่ผ่านกิจกรรม'
            ]);
        DB::table('p_status') -> insert([
            'p_status_id' => '3',
            'p_status_name' => 'ผ่านกิจกรรม'
            ]);


        DB::table('department') -> insert([
            'dept_id' => '001',
            'dept_name' => 'ภาควิชาชีววิทยา'
            ]);
        DB::table('department') -> insert([
            'dept_id' => '002',
            'dept_name' => 'ภาควิชาเคมี'
            ]);
        DB::table('department') -> insert([
            'dept_id' => '003',
            'dept_name' => 'ธรณีวิทยา'
            ]);
        DB::table('department') -> insert([
            'dept_id' => '004',
            'dept_name' => 'ภาควิชาฟิกสิกส์และวัสดุศาสตร์'
            ]);
        DB::table('department') -> insert([
            'dept_id' => '005',
            'dept_name' => 'ภาควิชาเคมีอุตสาหกรรม'
            ]);
        DB::table('department') -> insert([
            'dept_id' => '006',
            'dept_name' => 'ภาควิชาคณิตศาสตร์'
            ]);
        DB::table('department') -> insert([
            'dept_id' => '007',
            'dept_name' => 'ภาควิชาสถิติ'
            ]);
        DB::table('department') -> insert([
            'dept_id' => '008',
            'dept_name' => 'ภาควิชาวิทยาการคอมพิวเตอร์'
            ]);
        DB::table('department') -> insert([
            'dept_id' => '009',
            'dept_name' => 'สาขาวิชาวิทยาศาสตร์สิ่งแวดล้อม'
            ]);
        DB::table('department') -> insert([
            'dept_id' => '010',
            'dept_name' => 'สโมสรนักศึกษา'
            ]);


        DB::table('category') -> insert([
            'atype_id' => '1',
            'atype_name' => 'กิจกรรมบังคับเข้าร่วม'
            ]);
        DB::table('category') -> insert([
            'atype_id' => '2',
            'atype_name' => 'กิจกรรมที่เลือกเข้ร่วม'
            ]);

    }

    }

