<?php
	session_start();
	if(isset($_SESSION['user_name']))
	{
		$user=$_SESSION['user_name'];
		$tno=$_POST['tno'];
		echo "<a href='book_train.php'>Back</a><br><br>";
		mysql_connect("localhost","root","");
		mysql_select_db("railways");
		$q1="SELECT seats FROM train WHERE tno='$tno'";
		$seats=mysql_fetch_array(mysql_query($q1));
		if($seats[0] == 0)
		{
		echo "<script>alert('No seats available!!');
			window.location.href = 'check_train.php'; </script>";
		}
		else
		{
			$q2="SELECT * FROM train WHERE tno='$tno'";
			$run=mysql_query($q2);
			echo "<html><table border=1>";
			echo "<tr>
					<th>Train No.</th>
					<th>Train Name</th>
					<th>Source</th>
					<th>Destination</th>
					<th>Time of Departure</th>
					<th>Time of Arrival</th>
					<th>Destination Time</th>
					<th>Available Seats</th>
					<th>Fare</th>
				</tr>";
			while($r=mysql_fetch_array($run))
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
				</tr>";
			}
			echo "</table><br><br><br>";
			
			echo "<form method='POST' action='booking_done.php'>";
			echo "<input type='hidden' name='tno' value='$tno'>";
			echo "Select Number of Seats: <input type='number' name='num_seats'>";
			echo "<input type='submit' value='Book'>";
			echo "</form></html>";
		}
	}
	else
	{
		echo "<script>alert('SESSION EXPIRED!!');
		window.location.href = 'index.html'; </script>";
	}
?>