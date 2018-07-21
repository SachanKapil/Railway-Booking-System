<?php
session_start();
if(isset($_SESSION['user_name']) && $_SESSION['user_name']=="admin")
{
	echo "<html>
		<a href='admin.php'>BACK</a><br><br><br><br><br><br><br><br><br>
		<b>NEW TRAIN</b>
		<form method='POST' action='train_added.php'>
			Enter Train no.: <input type='text' name='tno'><br>
			Enter Train name: <input type='text' name='tname'><br>
			Enter Source: <input type='text' name='source'><br>
			Enter Destination: <input type='text' name='destination'><br>
			Enter Departure time: <input type='time' name='departure'><br>
			Enter Arrival time: <input type='time' name='arrival'><br>
			Enter Destination time: <input type='time' name='dest_time'><br>
			Enter Total seats: <input type='number' name='seats'><br>
			Enter Fare per seat: <input type='number' name='fare'><br><br>
			<input type='submit' value='ADD TRAIN'>
		</form>
	</html>";
}
else
{
	echo "<script>alert('SESSION EXPIRED!!');
	window.location.href = 'index.html'; </script>";
}