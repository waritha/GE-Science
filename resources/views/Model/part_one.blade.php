@extends('admin.layouts.template')
@section('content')
<html>
<head>
    <link rel="stylesheet" href="{{url('foundation/css/foundation.css')}}" />
    <script                 src="{{url('foundation/js/vendor/modernizr.js')}}"></script>
    <script                 src="{{url('jquery-1.12.0.min.js')}}"></script>
    <title>Participation</title>

</head>
<body>


    <?php
        $act_id             = $act_data['activity_id'];
        $act_name           = $act_data['a_name'];

        /*$users = DB::table('participation')->get();*/

        $users = DB::select("SELECT * FROM participation WHERE activity_id = $act_id");

?>
<p><h4><strong><?php echo "กิจกรรม $act_name";  ?></strong></h4>

<!-- คนละส่วน -->






<form id="form1" name="form1" method="post" action="{{ url('/addpart_one/'.$act_id) }}">  
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input id="act_id" type="hidden" name="act_id" value="{{ $act_id }}">

<table  width="650" border="1" cellspacing="2" cellpadding="0">  
  <tr>  
    <td>
        <strong>รหัสนักศึกษา</strong>
        <input type="text" id="student_id" name="student_id" pattern="[0 -9]*" minlength="9" maxlenght="10" title="กรุณากรอกตัวเลข 10 หลัก"  />
     
      <button  id="addpart" type="button">เพิ่ม</button>  
     </td> 
   </tr>  
</table>


<table id="myTbl" width="800" border="1" cellspacing="2" cellpadding="0">
    <tbody>
        <tr>  
            <td >
               <strong>ลำดับ</strong> 
            </td> 
            <td >
               <strong>รหัสนักศึกษา</strong> 
            </td>  
            <td>
                <strong>สถานะผู้เข้าร่วมกิจกรรม</strong>
            </td>  
            <td>
                <strong>ลบ</strong>
            </td> 
            <td>
                <strong>แก้ไข</strong>
            </td> 
            <td>
                <strong>หมายเหตุ</strong>
            </td> 
       </tr>  
  <!-- <tr id="firstTr">   -->
                <!-- <td>
                </td>  
                <td>

                <select name="a_status" id="a_status" >
                  <option value="ผู้เข้าร่วมกิจกรรม" >ผู้เข้าร่วมกิจกรรม</option>
                  <option value="ประธาน" >ประธาน</option>
                  <option value="ผู้เข้าร่วมกิจกรรม(staff)" >ผู้เข้าร่วมกิจกรรม(staff)</option>
              
                </select>
                </td>   -->
   <!-- </tr>   -->
   
    </tbody>
</table> 

<br />  


<!-- เข้าฐานข้อมูล -->
<input id="submit" type="submit" class="button" value="บันทึก" id="Submit" > <input type="reset"  class="button" value="รีเซ็ต">
 
</form> 


</body>
<script language="javascript" type="text/javascript"></script>  
<script type="text/javascript">
    var number = 0;
    var info = '';
    $('#addpart').click(function() {
        var std_id = $('#student_id').val();
        /*if (std_id.length >= 9) {*/

        if (std_id.length == 9) {
            var dropdown = '<select id="dropdown" name="std[' + number + '][status]" ><option value="ผู้เข้าร่วมกิจกรรม" >ผู้เข้าร่วมกิจกรรม</option><option value="ประธาน" >ประธาน</option><option value="ผู้เข้าร่วมกิจกรรม(staff)" >ผู้เข้าร่วมกิจกรรม(staff)</option></select>';
            var inputHidden = '<input type="hidden" name="std[' + number + '][id]" value="' + std_id + '" />';
            var htmlContent = ' <tr><td>' + (number+1) + '</td><td>' + inputHidden + '<input type="text" name="std[' + number + '][id]" value="' + std_id + '" disabled /></td>  <td>' + dropdown + '</td>  <td><button id="delete" type="button">ลบ</button></td> <td><button id="edit" type="button">แก้ไข</button></td> <td><button id="save" type="button">บันทึก</button></td></tr>';
            number++;
            $('#myTbl tbody').append(htmlContent);
            $('#student_id').val('');
        } else {
            alert('student id less than 9 charecter');
        }
    });

    $(document).on('click', '#delete', function () {
        $(this).closest('tr').remove();
        return false;
    });

    $(document).on('click', '#edit', function () {
        $(this).parent().parent().find('input').prop("disabled", false);
    });

    $(document).on('click', '#save', function () {
        var temp = $(this).parent().parent().find('input[type=text]').val();
        $(this).parent().parent().find('input[type=text]').prop("disabled", true);
        $(this).parent().parent().find('input[type=hidden]').val(temp);
    });
</script>
</html>



@stop