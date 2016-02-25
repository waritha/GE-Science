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

            $sql0 = "SELECT * FROM participation_1 WHERE student_id LIKE '".$id."'";
            if(count(DB::select($sql0)) <= 0){


             $sql1 = "INSERT INTO participation_1
                        SET student_id = '{$id}',
                            activity_id = '{$activity_id}',
                            a_status = '{$status}'";
                        DB::select($sql1);
        }else{

                    $sql11 = "UPDATE participation_1 SET student_id =  '{$id}',
                                           activity_id = '{$activity_id}',
                                           a_status = '{$status}' WHERE activity_id = $part_act_id and student_id = $part_stu_id";
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



    // public function selectpart_search($activity_id,$keyword_stu){

    //     //ส่วนดึงชื่อกิจกรรมที่เลือก
    //     $sql = "SELECT * FROM activity WHERE activity_id = $activity_id";
    //     $pct_data = DB::select($sql);
    //     $pct_data =$this->arrayMap($pct_data);
    //     $pct_data = $pct_data[0];

    //     //ส่วนค้นหา
    //     /*$users = DB::select("SELECT * FROM student WHERE student_id = $student_id AND 
    //     (student_id LIKE '%".$keyword_stu."%' or 
    //     first_name  LIKE '%".$keyword_stu."%' or 
    //     last_name   LIKE '%".$keyword_stu."%')");*/

    //     $sql2 = "SELECT * FROM student WHERE student_id = $student_id AND 
    //     (student_id LIKE '%".$keyword_stu."%' or 
    //     first_name  LIKE '%".$keyword_stu."%' or 
    //     last_name   LIKE '%".$keyword_stu."%')";
    //     $search_data = DB::select($sql2);
    //     $search_data =$this->arrayMap($search_data);
    //     $search_data = $search_data[0];



    //     return view('Model.result_search_studentpart')->with("pct_data,keyword_stu",$pct_data,$keyword_stu);
    //     /*return view('Model.result_search_studentpart')->with("pct_data,search_data",$pct_data,$search_data);*/

    // }

    // public function result_searchpart($activity_id){

    //     $sql = "SELECT * FROM activity WHERE activity_id = $activity_id";
    //     $pct_data = DB::select($sql);

    //     $pct_data =$this->arrayMap($pct_data);
    //     $pct_data = $pct_data[0];
    //     return view('Model.result_search_studentpart')->with("pct_data",$pct_data);

    // }


}