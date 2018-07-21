<?php
	session_start();
	if(isset($_SESSION['user_name']))
	{
		echo "<a href='welcome.php'>BACK</a><br><br>";
		$x=$_SESSION['user_name'];
		echo "WELCOME ".$x." Book a journey<br><br><br><br><br><br>";
		echo "<form method='POST' action='check_train.php'>";
			mysql_connect("localhost","root","");
			mysql_select_db("railways");
			
			echo "Select Source: <select name='source'>";
			$q1="SELECT DISTINCT source FROM train";
			$s=mysql_query($q1);
			while($rs=mysql_fetch_array($s))
			{
				echo "<option>".$rs[0]."</option>";
			}
			echo "</select><br><br><br>";
			
			echo "Select Destination: <select name='destination'>";
			$q2="SELECT DISTINCT destination FROM train";
			$d=mysql_query($q2);
			while($rd=mysql_fetch_array($d))
			{
				echo "<option>".$rd[0]."</option>";
			}
			echo "</select><br><br><br>";
			
			echo "<input type='submit' value='Check Trains'>";
		echo "</form>";
	}
	else
	{
		echo "<script>alert('SESSION EXPIRED!!');
		window.location.href = 'index.html'; </script>";
	}
?>