<?php
$x=$_POST['user_name'];
$y=$_POST['password'];
if($x=="" || $y=="")
{
	echo "<script> alert('Please fill the details');
			window.location.href ='login.php'; </script>";
}
else
{
	mysql_connect("localhost","root","");
	mysql_select_db("railways");
	$q1="SELECT * FROM user WHERE user_name='$x' AND password='$y'";
	if(mysql_num_rows(mysql_query($q1))==0)
	{
		echo "<script>alert('Invalid User!');
			window.location.href ='login.php'; </script>";
	}
	else
	{
		session_start();
		$_SESSION['user_name']=$x;
		if($x == "admin")
		{		
			echo "<script>alert('User Successfully Logged In!');
			window.location.href ='admin.php'; </script>";
		}
		else
		{
			echo "<script>alert('User Successfully Logged In!');
			window.location.href ='welcome.php'; </script>";
		}
		
	}
}
?>