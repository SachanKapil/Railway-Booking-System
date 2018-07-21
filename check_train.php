<?php
	session_start();
	if(isset($_SESSION['user_name']))
	{
		$source=$_POST['source'];
		$destination=$_POST['destination'];
		echo "<a href='book_train.php'>Back</a><br><br>";
		mysql_connect("localhost","root","");
		mysql_select_db("railways");
		$q="SELECT * FROM train WHERE source='$source' AND destination='$destination'";
		$r1=mysql_query($q);
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
			while($r=mysql_fetch_array($r1))
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
			
			$r2=mysql_query($q);
			echo "<form method='POST' action='book_seats.php'>
				Enter Train No. : <select name='tno'>";
				while($s=mysql_fetch_array($r2))
				{
					echo "<option>".$s[0]."</option>";
				}
				echo "</select>";
				echo "<input type='submit' value='Book Seats'><br><br>
			</form></html>";
		
	}
	else
	{
		echo "<script>alert('SESSION EXPIRED!!');
		window.location.href = 'index.html'; </script>";
	}
?>