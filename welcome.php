<?php
	session_start();
	if(isset($_SESSION['user_name']))
	{
		$x=$_SESSION['user_name'];
		echo "WELCOME ".$x."<br><br><br><br><br><br>";
		
		echo "<a href='user_profile.php'>USER PROFILE</a><br><br>";
		echo "<a href='book_train.php'>BOOK A TRAIN</a><br><br>";
		echo "<a href='booking_history.php'>BOOKING HISTORY</a><br><br>";
		echo "<a href='booking_history.php'>CANCEL TICKET</a><br><br>";
		echo "<a href='settings.php'>USER SETTINGS</a><br><br>";
		echo "<a href='logout.php'>LOGOUT</a>";
	}
	else
	{
		echo "<script>alert('SESSION EXPIRED!!');
		window.location.href = 'index.html'; </script>";
	}
?>