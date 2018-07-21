<?php
	session_start();
	if(isset($_SESSION['user_name']))
	{
		$user=$_SESSION['user_name'];
		$num=$_POST['num_seats'];
		$tno=$_POST['tno'];
		echo "<a href='book_train.php'>Back</a><br><br>";
		mysql_connect("localhost","root","");
		mysql_select_db("railways");
		$q1="SELECT * FROM train WHERE tno='$tno'";
		$r=mysql_fetch_array(mysql_query($q1));
		$avail=$r[7]-$num;
		
		if($avail>=0)
		{
			$q1="UPDATE train SET seats='$avail' WHERE tno='$tno'";
			mysql_query($q1);
			$q2="SELECT * FROM train WHERE tno='$tno'";
			$r2=mysql_fetch_array(mysql_query($q2));
			$bill=$num*$r2[8];
			$q3="INSERT INTO user_train(user_name,tno,tname,source,destination,departure,arrival,dest_time,seats_booked,total_fare) VALUES('$user','$r2[0]','$r2[1]','$r2[2]','$r2[3]','$r2[4]','$r2[5]','$r2[6]','$num','$bill')";
			mysql_query($q3);
			
			$query4="SELECT * FROM user_train WHERE tno='$tno' AND user_name='$user'";
			$res4=mysql_query($query4);
			echo "<script>alert('Booking Successful');</script>";
			echo "Ticket Receipt";
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
			while($r=mysql_fetch_array($res4))
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
			echo "<a href='welcome.php'>HOME</a>";
		}
		else
		{
			echo "<script>alert('NUMBER OF SEATS YOU ENTERED EXCEEDS AVAILABLE SEATS');
				window.location.href = 'check_train.php'; </script>";
		}
	}
	else
	{
		echo "<script>alert('SESSION EXPIRED!!');
		window.location.href = 'index.html'; </script>";
	}
?>