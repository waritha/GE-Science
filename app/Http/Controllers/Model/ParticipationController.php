<?php
namespace App\Http\Controllers\Model;;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Excel;
class ParticipationController extends Controller
{

	public function arrayMap($transactions){
		return array_map(function($object){
          return (array) $object;
      }, $transactions);
	}



    public function partselect($activity_id){

        // get all data.
        $sql = "SELECT * FROM activity WHERE activity_id = $activity_id";
        $act_data = DB::select($sql);

        
        //dd($student_data);  
        $act_data =$this->arrayMap($act_data);
        $act_data = $act_data[0];
        return view('Model.part_select')->with("act_data",$act_data);

        /*วิธีส่งแบบ2ตัว

        return view('Model.result_search_studentpart')->with("pct_data",$pct_data)->with("pct_data,keyword_stu",$pct_data,$keyword_stu);*/
    }

    public function addToPart($activity_id){
        $part_stu_id    = Input::get('student_id');
        $part_act_id    = $activity_id;
/*        $part_act_id    =Input::get('activity_id');*/
        $part_sta     =Input::get('a_status');

        //dd($std_id.$std_title.$std_first.$std_last);

        $sql0 = "SELECT * FROM participation_1 WHERE student_id LIKE '".$part_stu_id."'";
        
        /*if($sql0->num_rows <= 0){*/
        if(count(DB::select($sql0)) <= 0){

        $sql = "INSERT INTO participation_1 VALUES ('$part_stu_id','$part_act_id',0)";
        DB::select($sql);

        /*}else{*/
            //echo"updated.<br>";
        $sql1 = "UPDATE participation_1 SET student_id =  '$part_stu_id',
                                           activity_id = '$part_act_id',
                                           a_status = '$part_sta' WHERE activity_id = $part_act_id and student_id = $part_stu_id";
                                            DB::select($sql1);


                }else{

                    $sql11 = "UPDATE participation_1 SET student_id =  '$part_stu_id',
                                           activity_id = '$part_act_id',
                                           a_status = '$part_sta' WHERE activity_id = $part_act_id and student_id = $part_stu_id";
                                           DB::select($sql11);
                }

        //
        /*$result = $mysqli->query("SELECT * FROM student WHERE student_id LIKE '".$part_stu_id."'");*/
        $sql4 = "SELECT * FROM student WHERE student_id LIKE '".$part_stu_id."'";
        /*if($sql4->num_rows <= 0){*/
        if(count(DB::select($sql4)) <= 0){
            $sql2= "INSERT INTO student VALUES ('$part_stu_id','','','','','','')";
            DB::select($sql2);
        }
        



        //


        $sql3 = "SELECT * FROM activity WHERE activity_id = $activity_id";
        $act_data = DB::select($sql3);
        $act_data =$this->arrayMap($act_data);
        $act_data = $act_data[0];
        /*return view('Model.part_select')->with("act_data",$act_data);*/

        //เพิ่มหน้าสรุปผล
        /*return view('Model.part_result')->with("msg","add success.");*/
        return view('Model.part_result')->with("act_data",$act_data);



}

    public function viewdetail($activity_id){

        $sql = "SELECT * FROM activity WHERE activity_id = $activity_id";
        $act_data = DB::select($sql);

        
        //dd($student_data);  
        $act_data =$this->arrayMap($act_data);

        $a=0;

        $act_data = $act_data[0];
        return view('Model.part_viewdetail')->with("act_data",$act_data);

         }


    //ทดสอบเข้าร่วมแบบรายคน javascipt
    public function part_one($activity_id){

        // get all data.
        $sql = "SELECT * FROM activity WHERE activity_id = $activity_id";
        $act_data = DB::select($sql);

        
        //dd($student_data);  
        $act_data =$this->arrayMap($act_data);
        $act_data = $act_data[0];
        return view('Model.part_one')->with("act_data",$act_data);

        /*วิธีส่งแบบ2ตัว

        return view('Model.result_search_studentpart')->with("pct_data",$pct_data)->with("pct_data,keyword_stu",$pct_data,$keyword_stu);*/
    }

    public function addPartOne($activity_id)
    {

        $std   = Input::get('std');
        // dd($std);
        // $act_id =Input::get('activity_id');
        // $act_status  =Input::get('a_status');

        // $act_test = $activity_id;

       
        foreach ($std as $student) {

            

            $id = $student['id'];
            $status = $student['status'];

            $sql0 = "SELECT * FROM participation_1 WHERE (student_id LIKE '$id' AND activity_id LIKE '$activity_id' )";
            if(count(DB::select($sql0)) <= 0){


             $sql1 = "INSERT INTO participation_1
                        SET student_id = '{$id}',
                            activity_id = '{$activity_id}',
                            a_status = '{$status}'";
                        DB::select($sql1);
        }else{

                    $sql11 = "UPDATE participation_1 SET /*student_id =  '{$id}',
                                           activity_id = '{$activity_id}',*/
                                           a_status = '{$status}' WHERE activity_id = $activity_id and student_id = $id";
                                           DB::select($sql11);
                }

         $sql4 = "SELECT * FROM student WHERE student_id LIKE '".$id."'";
        /*if($sql4->num_rows <= 0){*/
        if(count(DB::select($sql4)) <= 0){
            $sql2= "INSERT INTO student VALUES ('$id','','','','','','')";
            DB::select($sql2);
        }

    }



        $sql12 = "SELECT * FROM activity WHERE activity_id = $activity_id";
        $act_data = DB::select($sql12);

        
        //dd($student_data);  
        $act_data =$this->arrayMap($act_data);
        $act_data = $act_data[0];
        return view('Model.part_result')->with("act_data",$act_data);
    }



    public function delpart($student_id,$act_id){

        $std = $student_id;
        $act = $act_id;

        $sql = "DELETE FROM participation_1 WHERE (student_id = $std AND activity_id = $act)";
        DB::select($sql);

        $sql12 = "SELECT * FROM activity WHERE activity_id = $act";
        $act_data = DB::select($sql12);

        
        //dd($student_data);  
        $act_data =$this->arrayMap($act_data);
        $act_data = $act_data[0];
        return view('Model.part_viewdetail')->with("act_data",$act_data);




    }


    


}