<?php

//Form backup

Route::controller('admin/index','Admins\DashboardController');

Route::get('admin/detailuser',"Admins\FormController@getdatailuser");
Route::get('admin/setuser',"Admins\FormController@getsetuser");
Route::get('admin/manualuser',"Admins\FormController@getmanualuser");
Route::get('admin/logoutuser',"Admins\FormController@logoutuser");

Route::get('admin/dataexcel',"Admins\FormController@dataexcel");

Route::get('admin/report',"Admins\FormController@report");

Route::get('admin/setpage1',"Admins\FormController@setpage1");
Route::get('admin/setpage2',"Admins\FormController@setpage2");
Route::get('admin/setpage3',"Admins\FormController@setpage3");

Route::get('admin/joinact',"Admins\FormController@joinact");

Route::get('admin/partexcel',"Admins\FormController@partexcel");

//link UI
Route::get('datastudent', function(){
    return view('Model/student');
});

Route::get('datage_activity', function(){
    return view('Model/ge_activity');
});

Route::get('data_activity', function(){
    return view('Model/activity');
});

Route::get('data_participation', function(){
    return view('Model/participation');
});

//test student
Route::get('check-connect',function(){
 if(DB::connection()->getDatabaseName())
 {
 return view('student');// return view('student');  PHPExcelReadToMySQL
 }else{
 return 'Connection False !!';
 }
 
});


//test


Route::get('part_one', function(){
    return view('Model/part_one');
});


Route::get('testlist', function(){
    return view('testlistpart');
});


//  end test student






//Start table student
/*Route::get('student', function(){
    return view('student');
});*/

Route::get('studentform',"Model\StudentController@form"); //rigth!!!
Route::post('add/',"Model\StudentController@addStudent");

Route::get('edit/{student_id}',"Model\StudentController@editStudent");

Route::post('edit',"Model\StudentController@updateStudent");

Route::get('delete/{student_id}',"Model\StudentController@deleteStudent");

Route::get('search/student',function(){
	$keyword = trim(Input::get('keyword'));
	return view('Model/result_search_student')->with("keyword",$keyword);
});

//Route::post('del',"StudentController@del");






//End !!

//Start table GE_activity
/*Route::get('ge_activity', function(){
    return view('ge_activity');
});
*/
Route::get('geform',"Model\GEactivityController@geform"); 
Route::post('addge',"Model\GEactivityController@addge");

Route::get('editge/{ge_id}',"Model\GEactivityController@editActivity");
Route::post('editge',"Model\GEactivityController@updateActivity");

Route::get('deletege/{ge_id}',"Model\GEactivityController@deleteActivity");
Route::post('delge',"Model\GEactivityController@delge");

//END!!



//Start Activity
/*Route::get('activity', function(){
    return view('activity');
});*/
Route::get('actform',"Model\ActivityController@form");
Route::post('addact',"Model\ActivityController@addActivity");

Route::post('editact',"Model\ActivityController@updateActivity");
Route::get('editact/{activity_id}',"Model\ActivityController@editactivity");

Route::get('deleteact/{activity_id}',"Model\ActivityController@deleteactivity");
//Route::post('del',"ActivityController@del");


//Route::get('testexcel',"ExcelController@testExcel");




//END!!


//Start Participation
//Route::get('selectpart/{activity_id}',"Model\ParticipationController@selectpart");  เสีย

Route::get('partselect/{activity_id}',"Model\ParticipationController@partselect");

//test part_one
Route::get('part_one/{activity_id}',"Model\ParticipationController@part_one");


Route::post('addpart/{activity_id}',"Model\ParticipationController@addToPart");

Route::get('viewdetail/{activity_id}',"Model\ParticipationController@viewdetail");

Route::post('addpart_one/{activity_id}',"Model\ParticipationController@addPartOne");



/*Route::get('selectpart_search/{activity_id},{keyword_stu}',"Model\ParticipationController@selectpart_search");

Route::get('search/studentpart',function(){
	$keyword = trim(Input::get('keyword_stu'));
	return view('Model/result_search_studentpart')->with("keyword_stu",$keyword);
});*/


//END!!



//Start Excel
//Route::get('test1',"TestController@testcreate"); 
Route::get('/test',array(
	'aa' => 'gettest',
	'uses' => 'TestController@gettest'
	));

Route::post('/test',array(
	'aa' => 'postUpload',
	'uses' => 'TestController@postUpload'
	));

//End Excel

