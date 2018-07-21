<?php
$a=$_POST['user_name'];
$b=$_POST['password'];
$c=$_POST['gender'];
$d=$_POST['nation'];
$e=$_POST['mobile'];
if($a=="" || $b==""|| $c==""|| $d==""|| $e=="")
{
	echo "<script> alert('Please fill the details');
			window.location.href ='login.php'; </script>";
}
else
{
	mysql_connect("localhost","root","");
	mysql_select_db("railways");
	$q1="SELECT * FROM user WHERE user_name='$a'";
	if(mysql_num_rows(mysql_query($q1))!=0)
	{
		echo "<script>alert('User Aready Exists');
			window.location.href ='register.php'; </script>";
	}
	else
	{
		$q2="INSERT INTO user (user_name,password,gender,nation,mobile)VALUES('$a','$b','$c','$d','$e')";
		mysql_query($q2);
		echo "<script>alert('User Successfully Registered');
			window.location.href ='index.html'; </script>";
		//header("location:index.html");
	}
	
}
?>