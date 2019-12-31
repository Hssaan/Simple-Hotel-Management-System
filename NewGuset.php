<?php
session_start();
//ini_set( "display_errors", 0);
include 'config.php';

if(isset($_POST['NewGuest'])){


$ROOMID=$_POST['ROOMID'];

$UpdateRoom = oci_parse($conn, 'UPDATE ROOMS SET ROOMSTATUS =\'Booked\' WHERE ROOMID = :ROOMID ');

oci_bind_by_name($UpdateRoom, ':ROOMID', $ROOMID);



	// Execute and commit the transaction...

	$executeUpdate = oci_execute($UpdateRoom);  
	if ($executeUpdate) {
		
    $commitUpdate = oci_parse($conn, 'Commit');
	
	    echo("<center>تم تعديل حالة الغرفة إلى محجوزة</center>");
		
	oci_execute($commitUpdate);
	}
	else{
			    echo("<center>حدث خطأ</center>");
		
	}
	oci_free_statement($UpdateRoom);

}
?>

<?php
//ini_set( "display_errors", 0);
include 'config.php';

if(isset($_POST['GUESTSearch'])){


$ROOMID=$_POST['ROOMID'];

$UpdateRoom = oci_parse($conn, 'UPDATE ROOMS SET ROOMSTATUS =\'Available\' WHERE ROOMID = :ROOMID ');

oci_bind_by_name($UpdateRoom, ':ROOMID', $ROOMID);



	// Execute and commit the transaction...

	$executeUpdate = oci_execute($UpdateRoom);  
	if ($executeUpdate) {
		
    $commitUpdate = oci_parse($conn, 'Commit');
	
	    echo("<center>تم تعديل حالة الغرفة إلى متوفرة</center>");
		
	oci_execute($commitUpdate);
	}
	else{
			    echo("<center>حدث خطأ</center>");
		
	}
	oci_free_statement($UpdateRoom);

}
?>


<?php
//ini_set( "display_errors", 0);
include 'config.php';

if(isset($_POST['NewGuest'])){

$GUESTID=$_POST['GUESTID'];
$GUESTFNAME=$_POST['GUESTFNAME'];
$GUESTLNAME=$_POST['GUESTLNAME'];
$GUESTPP=$_POST['GUESTPP'];
$GUESTMOBILE=$_POST['GUESTMOBILE'];
$GUESTEMAIL=$_POST['GUESTEMAIL'];

$insertGUEST = oci_parse($conn, 'INSERT INTO GUESTS (GUESTID,GUESTFNAME,GUESTLNAME,GUESTPP,GUESTMOBILE,GUESTEMAIL)  VALUES(:GUESTID,:GUESTFNAME, :GUESTLNAME, :GUESTPP, :GUESTMOBILE, :GUESTEMAIL)');

oci_bind_by_name($insertGUEST, ':GUESTID', $GUESTID);
oci_bind_by_name($insertGUEST, ':GUESTFNAME', $GUESTFNAME);
oci_bind_by_name($insertGUEST, ':GUESTLNAME', $GUESTLNAME);
oci_bind_by_name($insertGUEST, ':GUESTPP', $GUESTPP);
oci_bind_by_name($insertGUEST, ':GUESTMOBILE', $GUESTMOBILE);
oci_bind_by_name($insertGUEST, ':GUESTEMAIL', $GUESTEMAIL);




// Execute and commit the transaction...

	$executeGUEST = oci_execute($insertGUEST);  
	if ($executeGUEST) {
		
    $commitGUEST = oci_parse($conn, 'Commit');
	
	    echo("<center>تم تسجيل العميل بنجاح</center>");
		
	oci_execute($commitGUEST);
	}
	else{
			    echo("<center>لم يتم تسجيل العميل</center>");
		
	}
	oci_free_statement($insertGUEST);

	
	}

?>


<?php
//ini_set( "display_errors", 0);
include 'config.php';


if(isset($_POST['NewGuest'])){

$GUESTID=$_POST['GUESTID'];
$BOOKINGID=$_POST['BOOKINGID'];
$NOGUESTS=$_POST['NOGUESTS'];
$NONIGHTS=$_POST['NONIGHTS'];
$CHECKINDATE=$_POST['CHECKINDATE'];
$CHECKINTIME=$_POST['CHECKINTIME'];
$ROOMID=$_POST['ROOMID'];

$insertBOOKING = oci_parse($conn, 'INSERT INTO BOOKINGS (BOOKINGID,GUESTID,ROOMID,NOGUESTS,NONIGHTS,CHECKINDATE,CHECKINTIME)  VALUES(:BOOKINGID,:GUESTID, :ROOMID, :NOGUESTS, :NONIGHTS,TO_DATE(:CHECKINDATE, \'yyyy/mm/dd\'), :CHECKINTIME)');

oci_bind_by_name($insertBOOKING, ':BOOKINGID', $BOOKINGID);
oci_bind_by_name($insertBOOKING, ':GUESTID', $GUESTID);
oci_bind_by_name($insertBOOKING, ':ROOMID', $ROOMID);
oci_bind_by_name($insertBOOKING, ':NOGUESTS', $NOGUESTS);
oci_bind_by_name($insertBOOKING, ':NONIGHTS', $NONIGHTS);
oci_bind_by_name($insertBOOKING, ':CHECKINDATE', $CHECKINDATE);
oci_bind_by_name($insertBOOKING, ':CHECKINTIME', $CHECKINTIME);


	
	// Execute and commit the transaction...
	
	$executeBOOKING = oci_execute($insertBOOKING);  
	if ($executeBOOKING) {
		
    $commitBOOKING = oci_parse($conn, 'Commit');
	
	    echo("<center>تم تأكيد الحجز بنجاح</center>");
		
	oci_execute($commitBOOKING);
	}
	else{
			    echo("<center>لم يتم تأكيد الحجز</center>");
		
	}
	oci_free_statement($insertBOOKING);

}
?>

<?php
//ini_set( "display_errors", 0);
include 'config.php';

if(isset($_POST['NewGuest'])){



$BOOKINGID=$_POST['BOOKINGID'];
$GUESTID=$_POST['GUESTID'];
$BILLID=$_POST['BILLID'];
$CHECKINDATE=$_POST['CHECKINDATE'];
$username = $_SESSION['username'];
$_SESSION['BILLID']=$BILLID;

$insertBILL = oci_parse($conn, 'INSERT INTO BILLS (BILLID,BOOKINGID,ISSUEDATE,EMPLOYEEUSERNAME)  VALUES(:BILLID,:BOOKINGID, TO_DATE(:ISSUEDATE, \'yyyy/mm/dd\'), :EMPLOYEEUSERNAME)');


oci_bind_by_name($insertBILL, ':BILLID', $BILLID);
oci_bind_by_name($insertBILL, ':BOOKINGID', $BOOKINGID);
oci_bind_by_name($insertBILL, ':ISSUEDATE', $CHECKINDATE);
oci_bind_by_name($insertBILL, ':EMPLOYEEUSERNAME', $username);


	// Execute and commit the transaction...

	$executeBILL = oci_execute($insertBILL);  
	if ($executeBILL) {
		
    $commitBILL = oci_parse($conn, 'Commit');
	
	    echo("<center>تم إصدار الفاتورة بنجاح</center>");
		
	oci_execute($commitBILL);
	}
	else{
			    echo("<center>لم تتم إصدار الفاتورة</center>");
		
	}
	oci_free_statement($insertBILL);

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

	<div  class = "GUESTBody">
    <section id="GUEST-form" class="py-3">

       <div class="GUEST-page">
	   	<h1 class = "GUESTFormTitle"> تسجيل دخول عميل جديد </h1>
  <div class="GUESTform"  >
    <form class="GUEST-form" id="GUEST" name="NewGuest" method="post" action="">
	
	
    <tr> <td>رقم الغرفة المتاحة</td><td>
	<select id = "ROOMID"  name = "ROOMID" > <?php
	include 'config.php';
      $sql = "SELECT ROOMID FROM ROOMS WHERE ROOMSTATUS = 'Available'";
      $stid = @oci_parse($conn, $sql);
      if(!$stid){
        $e = oci_error($conn);
        exit($e['message']);
      }
      $success = @oci_execute($stid);
      if(!$success){
		  
        $e = oci_error($conn);
        exit($e['message']);
      }
		while ($row = oci_fetch_assoc($stid)) 
      {
		  $ROOMID=$row["ROOMID"];
        echo "<option value= \" $ROOMID \" > " . $row['ROOMID'] . "</option>";
		}
		echo "</td></tr></SELECT>";		

	  
    ?>
	

<br>
	  <input title="معرف العميل" id="GUESTID" name="GUESTID" type="hidden" autofocus="autofocus" required="required" /><br>
	  <input title="معرف الحجز" id="BOOKINGID" name="BOOKINGID" type="hidden" autofocus="autofocus" required="required" /><br>
	  <input title="معرف الفاتورة" id="BILLID" name="BILLID" type="hidden" autofocus="autofocus" required="required" /><br>
	  <input title="مطلوب : اسم النزيل" id="GUESTFNAME" name="GUESTFNAME" type="text" placeholder="اسم النزيل" autofocus="autofocus" required="required"/>

	  <input title="مطلوب : الاسم الاخير للنزيل" id="GUESTLNAME" name="GUESTLNAME" type="text" placeholder="الاسم الأخير" autofocus="autofocus" required="required"/>

	  <input title="مطلوب عدد الأشخاص" id="NOGUESTS" name="NOGUESTS" type="number" placeholder="عدد الأشخاص" autofocus="autofocus" required="required"/>

	  <input title="مطلوب: عدد الليالي" id="NONIGHTS" name="NONIGHTS" type="number" placeholder="عدد الليالي" autofocus="autofocus" required="required"/>
	  <tr> <td>تاريخ الدخول</td></tr>
	  <input title="مطلوب : تاريخ الدخول" id="CHECKINDATE" name="CHECKINDATE" type="date" placeholder="تاريخ الدخول" autofocus="autofocus" required="required"/>
	  <tr> <td>وقت الدخول</td></tr>
	  <input title="مطلوب : وقت الدخول" id="CHECKINTIME" name="CHECKINTIME" type="time" placeholder="وقت الدخول" autofocus="autofocus" required="required"/>

	  <input title="مطلوب رقم جواز السفر للنزيل" id="GUESTPP" name="GUESTPP" type="text" placeholder="رقم جواز السفر " autofocus="autofocus" required="required"/>

	  <input title="مطلوب : رقم التواصل للنزيل" id="GUESTMOBILE" name="GUESTMOBILE" type="tel" placeholder="رقم الجوال" pattern="[0][5][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" autofocus="autofocus" required="required"/>

	  <input title="مطلوب : البريد الإلكتروني للنزيل" id="GUESTEMAIL" name="GUESTEMAIL" type="email" placeholder="البريد الإلكتروني" autofocus="autofocus" required="required"/>

	  <button  id="submit" name="NewGuest" type="submit" class="btn1"> تسجيل العميل</button>
	  <button  id="reset" type="reset" class="btn1"  > مسح البيانات </button>

	</form>
  </div>
</div>
    </section>
	
	
	<!------------------------------------------------>
	<!------------------------------------------------>
	<!------------------------------------------------>
	<!------------------------------------------------>
	<!------------------------------------------------>
	<!------------------------------------------------>
	<!------------------------------------------------>

	
	    <section id="GUESTSearch-form" class="py-3">

       <div class="GUESTSearch-page">
	   	<h1 class = "GUESTFormTitle"> تسجيل خروج العميل </h1>
  <div class="GUESTSearchform"  >
    <form class="GUESTSearch-form" id="GUESTSearch" name="GUESTSearch" method="post" action="">
	
	
    <tr> <td>رقم الغرفة المحجوزة</td><td>
	<select id = "ROOMID"  name = "ROOMID" > <?php
	include 'config.php';
      $sql = "SELECT ROOMID FROM ROOMS WHERE ROOMSTATUS = 'Booked'";
      $stid = @oci_parse($conn, $sql);
      if(!$stid){
        $e = oci_error($conn);
        exit($e['message']);
      }
      $success = @oci_execute($stid);
      if(!$success){
		  
        $e = oci_error($conn);
        exit($e['message']);
      }
		while ($row = oci_fetch_assoc($stid)) 
      {
		  $ROOMID=$row["ROOMID"];
        echo "<option value= \" $ROOMID \" > " . $row['ROOMID'] . "</option>";
		}
		echo "</td></tr></SELECT>";		

	  
    ?>
	  <button  id="submit" name="GUESTSearch" type="submit" class="btn1"> تسجيل خروج</button>


	</form>
  </div>
</div>
    </section>
	
	<!------------------------------------------------>
	<!------------------------------------------------>
	<!------------------------------------------------>
	<!------------------------------------------------>
	<!------------------------------------------------>
	<!------------------------------------------------>
	<!------------------------------------------------>
	
		    <section id="GUESTSearch-form" class="py-3">
			
				   	<h1 class = "GUESTFormTitle"> الفواتير المصدرة </h1>
					
					
	<?php
//ini_set( "display_errors", 0);

include 'config.php';


$sql="SELECT BILLID, BOOKINGID, ISSUEDATE, EMPLOYEEFNAME, ROOMPRICE, NONIGHTS FROM BILLS
JOIN EMPLOYEES USING (EMPLOYEEUSERNAME)
JOIN BOOKINGS USING (BOOKINGID)
JOIN ROOMS USING (ROOMID)";



$stid = @oci_parse($conn, $sql);

      if(!$stid){
        $e = oci_error($conn);
        exit($e['message']);
      }
$success = @oci_execute($stid);

      if(!$success){
		  
        $e = oci_error($conn);
        exit($e['message']);
      }
	  


while ($row = oci_fetch_assoc($stid)) 
{
$BILLID=$row["BILLID"];
$BOOKINGID=$row["BOOKINGID"];
$ISSUEDATE=$row["ISSUEDATE"];
$ROOMPRICE=$row["ROOMPRICE"];
$NONIGHTS=$row["NONIGHTS"];
$EMPLOYEEFNAME=$row["EMPLOYEEFNAME"];
echo "<table border=1><tr>";
echo "<th>رقم الفاتورة</th>";
echo "<th>رقم الحجز</th>";
echo "<th>تاريخ الاصدار</th>";
echo "<th>سعر الليلة</th>";
echo "<th>عدد اليالي</th>";
echo "<th>اسم الموظف</th></tr>";
echo "<tr><td>". $row['BILLID'] ."</td>";
echo "<td>". $row['BOOKINGID'] ."</td>";
echo "<td>". $row['ISSUEDATE'] ."</td>";
echo "<td>". $row['ROOMPRICE'] ."</td>";
echo "<td>". $row['NONIGHTS'] ."</td>";
echo "<td>". $row['EMPLOYEEFNAME'] ."</td></tr>";
}
echo "</table>";

?>
    </section>
	
	<!------------------------------------------------>
	<!------------------------------------------------>
	<!------------------------------------------------>
	<!------------------------------------------------>
	<!------------------------------------------------>
	<!------------------------------------------------>
	<!------------------------------------------------>
	
			    <section id="GUESTSearch-form" class="py-3">
			
				   	<h1 class = "GUESTFormTitle"> آخر الحجوزات </h1>
					
					
	<?php
//ini_set( "display_errors", 0);

include 'config.php';


$sql="SELECT GUESTFNAME, BOOKINGID, ROOMID, CHECKINDATE, ROOMTYPE, NONIGHTS FROM BOOKINGS
JOIN GUESTS USING (GUESTID)
JOIN ROOMS USING (ROOMID)";



$stid = @oci_parse($conn, $sql);

      if(!$stid){
        $e = oci_error($conn);
        exit($e['message']);
      }
$success = @oci_execute($stid);

      if(!$success){
		  
        $e = oci_error($conn);
        exit($e['message']);
      }
	  


while ($row = oci_fetch_assoc($stid)) 
{
$GUESTFNAME=$row["GUESTFNAME"];
$BOOKINGID=$row["BOOKINGID"];
$ROOMID=$row["ROOMID"];
$ROOMTYPE=$row["ROOMTYPE"];
$CHECKINDATE=$row["CHECKINDATE"];
$NONIGHTS=$row["NONIGHTS"];
echo "<table border=1><tr>";
echo "<th>اسم العميل</th>";
echo "<th>رقم الحجز</th>";
echo "<th>رقم الغرفة</th>";
echo "<th>نوع الغرفة</th>";
echo "<th>تاريخ الدخول</th>";
echo "<th>عدد الليالي</th></tr>";
echo "<tr><td>". $row['GUESTFNAME'] ."</td>";
echo "<td>". $row['BOOKINGID'] ."</td>";
echo "<td>". $row['ROOMID'] ."</td>";
echo "<td>". $row['ROOMTYPE'] ."</td>";
echo "<td>". $row['CHECKINDATE'] ."</td>";
echo "<td>". $row['NONIGHTS'] ."</td></tr>";
}
echo "</table>";

?>
    </section>
	
	
	
	

		<script>
		
		;(function() {
		var GrandomString = function(length) {
			
			var text = "";
		
			var possible = "0123456789";
			
			for(var i = 0; i < length; i++) {
			
				text  += possible.charAt( Math.floor(Math.random() * possible.length));
			
			}
			
			return text;
		}

		// random string length
		var randomGuest = "GU" + GrandomString(4);

		
		// insert random string to the field
		var elemGuest = document.getElementById("GUESTID").value = randomGuest;

		
	})();
	
</script>

		<script>
		
		;(function() {
		var BOrandomString = function(length) {
			
			var text = "";
		
			var possible = "0123456789";
			
			for(var i = 0; i < length; i++) {
			
				text  += possible.charAt( Math.floor(Math.random() * possible.length));
			
			}
			
			return text;
		}

		// random string length

		var randomBooking = "BO" + BOrandomString(6);

		
		// insert random string to the field

		var elemBooking = document.getElementById("BOOKINGID").value = randomBooking;

		
	})();
	
</script>
		<script>
		
		;(function() {
		var BrandomString = function(length) {
			
			var text = "";
		
			var possible = "0123456789";
			
			for(var i = 0; i < length; i++) {
			
				text  += possible.charAt( Math.floor(Math.random() * possible.length));
			
			}
			
			return text;
		}

		// random string length

		var randomBill = BrandomString(7);
		
		// insert random string to the field

		var elemBill = document.getElementById("BILLID").value = randomBill;
		
	})();
	
</script>

	</div>
	
	
</body>

</html>