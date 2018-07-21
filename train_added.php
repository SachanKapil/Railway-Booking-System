<?php
session_start();
if(isset($_SESSION['user_name']) && $_SESSION['user_name']=="admin")
{
	$tno=$_POST['tno'];
	$tname=$_POST['tname'];
	$source=$_POST['source'];
	$destination=$_POST['destination'];
	$departure=$_POST['departure'];
	$arrival=$_POST['arrival'];
	$dest_time=$_POST['dest_time'];
	$seats=$_POST['seats'];
	$fare=$_POST['fare'];
	mysql_connect("localhost","root","");
	mysql_select_db("railways");
	$q1="SELECT * FROM train WHERE tno='$tno'";
	if(mysql_num_rows(mysql_query($q1)) == 0)
	{
		$q2="INSERT INTO train VALUES('$tno','$tname','$source','$destination','$departure','$arrival','$dest_time','$seats','$fare')";
		mysql_query($q2);
		echo "<script>alert('TRAIN Added');
		window.location.href = 'admin.php'; </script>";
	}
	else
	{
		echo "<script>alert('Train no. already exist');
		window.location.href = 'add_train.php'; </script>";
	}
}
else
{
	echo "<script>alert('SESSION EXPIRED');
	window.location.href = 'index.html'; </script>";
}
?>