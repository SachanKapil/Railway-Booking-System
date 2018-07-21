<?php
session_start();
if((isset($_SESSION['user_name']))&&($_SESSION['user_name']!='admin')){
	echo "<a href='welcome.php'>BACK</a><br><br>";
	$user=$_SESSION['user_name'];
	mysql_connect("localhost","root","");
	mysql_select_db("railways");
	
	$q1="SELECT * FROM user WHERE user_name='$user'";
	$r1=mysql_query($q1);
	$q2="SELECT * FROM user_train WHERE user_name='$user'";
	$r2=mysql_query($q2);
	if(mysql_num_rows($r2) != 0)
	{
		echo "BOOKING DETAILS";
			echo "<table border=1";
			echo "<tr>
					<th>PNR</th>
					<th>User Name</th>
					<th>Train No.</th>
					<th>Train Name</th>
					<th>Source</th>
					<th>Destination</th>
					<th>Time of Departure</th>
					<th>Time of Arrival</th>
					<th>Destination Time</th>
					<th>No of Seats Booked</th>
					<th>Total Fare</th>
				</tr>";
			while($r=mysql_fetch_array($r2))
			{
				echo "<tr>
						<td>".$r[0]."</td>
						<td>".$r[1]."</td>
						<td>".$r[2]."</td>
						<td>".$r[3]."</td>
						<td>".$r[4]."</td>
						<td>".$r[5]."</td>
						<td>".$r[6]."</td>
						<td>".$r[7]."</td>
						<td>".$r[8]."</td>
						<td>".$r[9]."</td>
						<td>".$r[10]."</td>
					</tr>";	
			}
			echo "</table><br><br>";
			echo "<form method='POST' action='cancel_ticket.php'>
					Select PNR to cancel : 
					<select name='cancel'>";
						$q3="SELECT pnr FROM user_train WHERE user_name='$user'";
						$r3=mysql_query($q3);
						while($s=mysql_fetch_array($r3))
						{
							echo "<option>".$s[0]."</option>";		
						}
					echo "</select>";
					echo "<input type='submit' value='Cancel Ticket'>
				</form>";
	}
	else
	{
			echo "<script>alert('No booking history');
			window.location.href = 'welcome.php'; </script>";
	}
}
else
{
	echo "<script>alert('Session Expired!!');
	window.location.href = 'login.php'; </script>";
}
?>