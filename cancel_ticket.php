<?php
session_start();
if(isset($_SESSION['user_name']))
{
	$user=$_SESSION['user_name'];
	$pnr=$_POST['cancel'];
	mysql_connect("localhost","root","");
	mysql_select_db("railways");
	$q1="SELECT * FROM user_train WHERE pnr='$pnr'";
	$r1=mysql_fetch_array(mysql_query($q1));
	$a=$r1[9];
	$b=$r1[2];
	$q2="UPDATE train SET seats=seats+'$a' WHERE tno='$b'";
	mysql_query($q2);
	$q3="DELETE FROM user_train WHERE pnr='$pnr'";
	mysql_query($q3);	
	echo "<script>alert('Cancellation Successful!!');
	window.location.href = 'booking_history.php'; </script>";

}
else
{
	echo "<script>alert('SESSION EXPIRED!!');
	window.location.href = 'login.php'; </script>";
}
?>