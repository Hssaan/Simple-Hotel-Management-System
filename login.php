<?php

session_start();
require 'config.php';
require 'style.php';


$conn = oci_connect('ProjectCT1412', '1234', 'localhost/orcl','AL32UTF8');
if(isset($_POST['login'])){

$admin_username=$_POST['txtName'];
$admin_password=$_POST['txtPassword'];

$admin_username = stripslashes($admin_username);
$admin_password = stripslashes($admin_password);
$admin_username = mysql_real_escape_string($admin_username);
$admin_password = mysql_real_escape_string($admin_password);
$stid=oci_parse($conn,"SELECT * FROM EMPLOYEES ");
oci_execute($stid);


while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {

    $username=$row['EMPLOYEEUSERNAME'];
	$pass=$row['EMPLOYEEPASSWORD'];
	$type=$row['EMPLOYEETYPE'];

    if($admin_username==$username and $admin_password==$pass){
		if($type == 1){
		$_SESSION['username']=$username;
		$_SESSION['types']=$type;
		header("location:NewStaff_NewRoom.php");
		}

		else{
		$_SESSION['username']=$username;
		$_SESSION['types']=$type;
		header("location:NewGuset.php");
		}
	}

 }


}


       // break;

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

<body>

	<div  class = "LoginBody">
    <section id="Login-form" class="py-3">

       <div class="login-page">
	   	<h1 class = "LoginFormTitle"> دخول الموظفين</h1>
  <div class="Loginform"  >
    <form class="login-form" id="login" name="login" method="post" action="login.php">
       
	  <input id="username" type="text" name="txtName" type="text" placeholder="اسم المستخدم" autofocus="autofocus" required="required"/>
      <input id="password" type="password" name="txtPassword" type="password" placeholder="كلمة المرور" autofocus="autofocus" required="required"/>
	  <button  id="submit" name="login" type="submit" class="btn1"  >دخول</button>

	</form>
  </div>
</div>
    </section>
		<script>
</script>
	</div>

</body>

</html>