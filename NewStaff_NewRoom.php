<?php
//ini_set( "display_errors", 0);
include 'config.php';

if(isset($_POST['NewStaff'])){

$EMPLOYEEUSERNAME=$_POST['EMPLOYEEUSERNAME'];
$EMPLOYEEPASSWORD=$_POST['EMPLOYEEPASSWORD'];
$EMPLOYEEFNAME=$_POST['EMPLOYEEFNAME'];
$EMPLOYEELNAME=$_POST['EMPLOYEELNAME'];
$EMPLOYEEMOBILE=$_POST['EMPLOYEEMOBILE'];
$EMPLOYEEEMAIL=$_POST['EMPLOYEEEMAIL'];
$EMPLOYEETYPE=$_POST['EMPLOYEETYPE'];

$insertEMPLOYEE = oci_parse($conn, 'INSERT INTO EMPLOYEES (EMPLOYEEUSERNAME,EMPLOYEEPASSWORD,EMPLOYEEFNAME,EMPLOYEELNAME,EMPLOYEEMOBILE,EMPLOYEEEMAIL,EMPLOYEETYPE)  VALUES(:EMPLOYEEUSERNAME, :EMPLOYEEPASSWORD, :EMPLOYEEFNAME, :EMPLOYEELNAME, :EMPLOYEEMOBILE, :EMPLOYEEEMAIL, :EMPLOYEETYPE)');


oci_bind_by_name($insertEMPLOYEE, ':EMPLOYEEUSERNAME', $EMPLOYEEUSERNAME);
oci_bind_by_name($insertEMPLOYEE, ':EMPLOYEEPASSWORD', $EMPLOYEEPASSWORD);
oci_bind_by_name($insertEMPLOYEE, ':EMPLOYEEFNAME', $EMPLOYEEFNAME);
oci_bind_by_name($insertEMPLOYEE, ':EMPLOYEELNAME', $EMPLOYEELNAME);
oci_bind_by_name($insertEMPLOYEE, ':EMPLOYEEMOBILE', $EMPLOYEEMOBILE);
oci_bind_by_name($insertEMPLOYEE, ':EMPLOYEEEMAIL', $EMPLOYEEEMAIL);
oci_bind_by_name($insertEMPLOYEE, ':EMPLOYEETYPE', $EMPLOYEETYPE);

// Execute and commit the transaction...

	$executeEMPLOYEE = oci_execute($insertEMPLOYEE);  
	if ($executeEMPLOYEE) {
		
			
	
    //Uncomment below line if needed for testing

    //print "Row Inserted";
    
    //Parse and execute commit statement to oracle, committing transaction.
    $commitEMPLOYEE = oci_parse($conn, 'Commit');
	
	    echo("<center>تم التسجيل بنجاح</center>");
		
	oci_execute($commitEMPLOYEE);
	}
	else{
			    echo("<center>حدث خطأ</center>");
		
	}
	oci_free_statement($insertEMPLOYEE);

	}
?>

<?php
//ini_set( "display_errors", 0);
include 'config.php';

if(isset($_POST['NewRoom'])){
	
	if(isset($_POST['ROOMID'])) {
    $CHECKROOMID = $_POST['ROOMID'];
}
$ROOMID=$_POST['ROOMID'];
$ROOMTYPE=$_POST['ROOMTYPE'];
$ROOMFLOOR=$_POST['ROOMFLOOR'];
$ROOMSPACE=$_POST['ROOMSPACE'];
$ROOMSTATUS=$_POST['ROOMSTATUS'];
$ROOMPRICE=$_POST['ROOMPRICE'];

$insertROOM = oci_parse($conn, 'INSERT INTO ROOMS (ROOMID,ROOMTYPE,ROOMFLOOR,ROOMSPACE,ROOMSTATUS,ROOMPRICE)  VALUES(:ROOMID,:ROOMTYPE, :ROOMFLOOR, :ROOMSPACE, :ROOMSTATUS,:ROOMPRICE)');

oci_bind_by_name($insertROOM, ':ROOMID', $ROOMID);
oci_bind_by_name($insertROOM, ':ROOMTYPE', $ROOMTYPE);
oci_bind_by_name($insertROOM, ':ROOMFLOOR', $ROOMFLOOR);
oci_bind_by_name($insertROOM, ':ROOMSPACE', $ROOMSPACE);
oci_bind_by_name($insertROOM, ':ROOMSTATUS', $ROOMSTATUS);
oci_bind_by_name($insertROOM, ':ROOMPRICE', $ROOMPRICE);


// Execute and commit the transaction...

	$executeROOM = oci_execute($insertROOM);  
	if ($executeROOM) {
		
			
	
    //Uncomment below line if needed for testing

    //print "Row Inserted";
    
    //Parse and execute commit statement to oracle, committing transaction.
    $commitROOM = oci_parse($conn, 'Commit');
	
	    echo("<center>تم تسجيل الغرفة بنجاح</center>");
		
	oci_execute($commitROOM);
	}
	else{
			    echo("<center>حدث خطأ</center>");
		
	}
	oci_free_statement($insertROOM);

	}
?>



<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="أهلا وسهلا بكم في موقع فندق حسان" />
  <meta name="keywords" content="فندق حسان,فندق,حسان " />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
    crossorigin="anonymous">
	<?php require 'style.php';?>
	

  <title>موقع فندق حسان</title>
  
  
</head>


	

<body id="NewBody">

	<div  class = "RoomBody">
    <section id="Room-form" class="py-3">

       <div class="Room-page">
	   	<h1 class = "RoomFormTitle"> تسجيل موظف جديد </h1>
  <div class="Roomform"  >
    <form class="Room-form" id="Room" name="Room" method="post" action="">
	

	  <input title="مطلوب : اسم المستخدم " id="username" name="EMPLOYEEUSERNAME" type="text" placeholder="اسم المستخدم" autofocus="autofocus" required="required"/>
	  <input title="مطلوب: كلمة المرور" id="password" name="EMPLOYEEPASSWORD" type="password" placeholder="كلمة المرور" autofocus="autofocus" required="required"/>
	  <input title="مطلوب : الاسم الأول" id="Fname" name="EMPLOYEEFNAME" type="text" placeholder="الاسم الأول" autofocus="autofocus" required="required"/>
	  <input title="مطلوب الاسم الأخير" id="Lname" name="EMPLOYEELNAME" type="text" placeholder="الاسم الأخير" autofocus="autofocus" required="required"/>
	  <input title="مطلوب: رقم الجوال" id="Mobile" name="EMPLOYEEMOBILE" type="tel" placeholder="رقم الجوال" pattern="[0][5][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" autofocus="autofocus" required="required"/>
	  <input title="مطلوب البريد الإلكتروني" id="Email" name="EMPLOYEEEMAIL" type="email" placeholder="البريد الإلكتروني" autofocus="autofocus" required="required"/>
	  <div title="حدد نوع العضوية">
	  <select name="EMPLOYEETYPE" id = "type" autofocus="autofocus" required="required">
		<option value = "0">نوع العضوية</option>
		<option value = "1">مدير</option>
		<option value = "2">موظف</option>
	  </select>
	  </div>
	  <button  id="submit" name="NewStaff" type="submit" class="btn1">تسجيل</button>
	  <button  id="reset" type="reset" class="btn1"  >مسح</button>

	</form>
  </div>
</div>
    </section>



    <section id="NewRoom-form" class="py-3">

       <div class="NewRoom-page">
	   	<h1 class = "NewRoomFormTitle"> تسجيل غرفة جديدة </h1>
  <div class="NewRoomform"  >
    <form class="NewRoom-form" id="NewRoom" name="NewRoom" method="post" action="">
	
	
	  <input title="رقم الغرفة" id="ROOMID" name="ROOMID" type="number" placeholder="رقم الغرفة"autofocus="autofocus" required="required" /><br>
	  <div title="حدد نوع الغرفة">
	  <select name="ROOMTYPE" id = "ROOMTYPE" autofocus="autofocus" required="required">
	  	<option value = "null">نوع الغرفة</option>
		<option value = "Single">مفردة</option>
		<option value = "Double">مزدوجة</option>
		<option value = "Triple">عائلية</option>
	  </select>
	  </div><br>
	  <input title="مطلوب : طابق الغرفة" id="ROOMFLOOR" name="ROOMFLOOR" type="number" placeholder="طابق الغرفة" autofocus="autofocus" required="required"/>
	  <input title="مطلوب: مساحة الغرفة" id="ROOMSPACE" name="ROOMSPACE" type="number" placeholder="مساحة الغرفة" autofocus="autofocus" required="required"/>
	  <div title="حدد حالة الغرفة">	  
	  <select name="ROOMSTATUS" id = "ROOMSTATUS" autofocus="autofocus" required="required">
	  	<option value = "null">حالة الغرفة</option>
		<option value = "Booked">محجوزة</option>
		<option value = "Available">متوفرة</option>
	  </select>
	  </div><br>
	  <input title="مطلوب سعر الغرفة" id="ROOMPRICE" name="ROOMPRICE" type="number" placeholder="سعر الغرفة" autofocus="autofocus" required="required"/>
	  <button  id="submit" name="NewRoom" type="submit" class="btn1">إضافة غرفة</button>
	  <button  id="reset" type="reset" class="btn1"  >مسح</button>

	</form>
  </div>
</div>
    </section>


	<script>
function DONE() {
  alert("تم إرسال المعلومات بنجاح");
}
</script>

	</div>
	
	
</body>

</html>