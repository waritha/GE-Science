<html>
<head>
<title>Test Json</title>
</head>
<body>        
<input type="text" name="txtName" id="txtName" value="">
<input type="text" name="txtLName" id="txtLName" value="">
<input name="btnButton" id="btnButton" type="button" value="เพิ่ม" onClick="JavaScript:doJson();">
<table id="tbshow">
        <thead>
        <tr>
            <th>ลำดับ</th>
            <th>รหัสนักศึกษา</th>
            <th>สถานะผู้เข้าร่วม</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

กดเพื่อยืนยัน
<input name="btn" id="btn" type="button" value="ยืนยัน" onClick="JavaScript:doSend();">
</br>
<span id="mySpan"></span>
</body>


<script language="JavaScript">
var obj =  [];
   
function newXmlHttp(){
  var xmlhttp = false;
 
  try{
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  }catch(e){
          try{
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }catch(e){
                xmlhttp = false;
          }
  }
 
  if(!xmlhttp && document.createElement){
    xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}
 
function doJson(){
 
        var name = document.getElementById("txtName").value;
        var lname = document.getElementById("txtLName").value;
       
        var employees = {};
        employees = {firstName : name ,lastName : lname};
        obj.push(employees);
       
        var tableRef = document.getElementById('tbshow').getElementsByTagName('tbody')[0];
        var newRow   = tableRef.insertRow(tableRef.rows.length);
        var noCell  = newRow.insertCell(0);
        var nameCell  = newRow.insertCell(1);
        var lnameCell  = newRow.insertCell(2);
        var btDelCell  = newRow.insertCell(3);
        var btEditCell  = newRow.insertCell(4);
        var noText  = document.createTextNode(obj.length);
        var nameText  = document.createTextNode(obj[obj.length-1].firstName);
        var lnameText  = document.createTextNode(obj[obj.length-1].lastName);
        noCell.appendChild(noText);
        nameCell.appendChild(nameText);
        lnameCell.appendChild(lnameText);
        btDelCell.innerHTML = '<input id='+(obj.length-1)+' type="button" value="delete" onClick="JavaScript:deleteRow(this);"/>';
        btEditCell.innerHTML = '<input id="e'+(obj.length-1)+'" type="button" value="edit" onClick="JavaScript:editRow(this);"/>';
        document.getElementById("txtName").value = " ";
        document.getElementById("txtLName").value = " ";
       
       
}
   
function doSend() {
        var myJsonString = JSON.stringify(obj);
        console.log(myJsonString);
        var url = "postajaxarray.php";
        var pmeters = "SendJson=" + myJsonString;
        xmlhttp = newXmlHttp();
        xmlhttp.open("POST",url,true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.setRequestHeader("Content-length", pmeters.length);
        xmlhttp.setRequestHeader("Connection", "close");
        xmlhttp.send(pmeters);
                               
        xmlhttp.onreadystatechange = function()
        {
 
        if(xmlhttp.readyState == 3)
        {
                document.getElementById("mySpan").innerHTML = "Now is Loading...";
        }
 
        if(xmlhttp.readyState == 4)
        {
                document.getElementById("mySpan").innerHTML = xmlhttp.responseText;
            
        }
                               
        }      
}
   
function deleteRow(idd) {  
  idd.parentElement.parentElement.remove();
 
  obj.splice(idd.id,1);
  for(i=0;i<=obj.length;i++){
     document.getElementById("tbshow").getElementsByTagName("tr")[i+1].getElementsByTagName("td")[3].lastChild.id = i;
     document.getElementById("tbshow").getElementsByTagName("tr")[i+1].getElementsByTagName("td")[4].lastChild.id = 'e'+i;
     document.getElementById("tbshow").getElementsByTagName("tr")[i+1].getElementsByTagName("td")[0].innerHTML=i+1;
        }
 
}
   
function editRow(ide) {
        var ideok = ide.id.substring(1);
       
        var input1 = document.createElement("input");
        input1.type = "text";
        input1.id = "input1";
        input1.value = obj[ideok].firstName;
        ide.parentElement.parentElement.getElementsByTagName("td")[1].innerHTML = " ";
        ide.parentElement.parentElement.getElementsByTagName("td")[1].appendChild(input1);
       
        var input2 = document.createElement("input");
        input2.type = "text";
        input2.id = "input2";
        input2.value = obj[ideok].lastName;
        ide.parentElement.parentElement.getElementsByTagName("td")[2].innerHTML = " ";
        ide.parentElement.parentElement.getElementsByTagName("td")[2].appendChild(input2);
   
        var Row   = ide.parentElement.parentElement;
        var btSaveCell  = Row.insertCell(5);
        btSaveCell.innerHTML = '<input id="s'+ideok+'" type="button" value="save" onClick="JavaScript:Savedata(this);"/>';
}
   
function Savedata(ide2) {
    var ideok2 = ide2.id.substring(1);
    obj[ideok2].firstName=ide2.parentElement.parentElement.getElementsByTagName("td")[1].lastChild.value;
    obj[ideok2].lastName=ide2.parentElement.parentElement.getElementsByTagName("td")[2].lastChild.value;
   
    ide2.parentElement.parentElement.getElementsByTagName("td")[1].innerHTML = obj[ideok2].firstName;
    ide2.parentElement.parentElement.getElementsByTagName("td")[2].innerHTML = obj[ideok2].lastName;
   
    ide2.remove();
}
</script>
</html>

<?php
inclued_get_data(SendJson);
$data = json_decode($_POST['SendJson'],true);

for($i=0;$i<sizeof($data);$i++){
        echo $data[$i]['firstName'];
        echo $data[$i]['lastName'];
        echo '</br>';}
?>