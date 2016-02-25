<?php namespace App\Http\Controllers\Admins; // กำหนดที่อยู่ของ Controller
use App\Http\Controllers\Controller; //เรียกใช้ Controller หลักของ Laravel 5.0
 
class DashboardController extends Controller {

 public function getIndex(){
 return view('admin.dashboard.index');
 }

 

}
