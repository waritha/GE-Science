<?php namespace App\Http\Controllers\Admins; // กำหนดที่อยู่ของ Controller
use App\Http\Controllers\Controller; //เรียกใช้ Controller หลักของ Laravel 5.0
 
class FormController extends Controller {

 public function getdatailuser(){
 return view('admin.dashboard.detailuser');
 }

 public function getsetuser(){
 return view('admin.dashboard.setuser');
 }

 public function getmanualuser(){
 return view('admin.dashboard.manualuser');
 }

 public function logoutuser(){
 return view('admin.dashboard.logoutuser');
 }

 public function dataexcel(){
 return view('admin.dashboard.dataexcel');
 }

 public function report(){
 return view('admin.dashboard.report');
 }

 public function setpage1(){
 return view('admin.dashboard.set-page1');
 }

 public function setpage2(){
 return view('admin.dashboard.set-page2');
 }

 public function setpage3(){
 return view('admin.dashboard.set-page3');
 }

 public function joinact(){
 return view('admin.dashboard.joinact');
 }

 public function partexcel(){
 return view('admin.dashboard.partexcel');
 }

}
