<?php
	session_start();
	if(isset($_SESSION['user_name']) && $_SESSION['user_name']=="admin")
	{
		echo "<a href='admin.php'>BACK</a><br><br>";
		$x=$_SESSION['user_name'];
		echo "WELCOME to your profile ADMIN<br><br><br><br><br><br>";
		mysql_connect("localhost","root","");
		mysql_select_db("railways");
		$q1="SELECT * FROM user WHERE user_name='$x'";
		$r=mysql_fetch_array(mysql_query($q1));
		echo "<table border='0'>";
		echo "<tr><th>NAME :</th><td>".$r[0]."</td></tr><br>";
		echo "<tr><th>PASSWORD : </th><td>".$r[1]."</td></tr><br>";
		echo "<tr><th>GENDER :</th><td>".$r[2]."</td></tr><br>";
		echo "<tr><th>NATIONALITY :</th><td>".$r[3]."</td></tr><br>";
		echo "<tr><th>MOBILE NO. : </th><td>".$r[4]."</td></tr><br>";
		echo "</table>";
	}
	else
	{
		echo "<script>alert('SESSION EXPIRED!!');
		window.location.href = 'index.html'; </script>";
	}
?>