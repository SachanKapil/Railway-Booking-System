<?php
	session_start();
	if(isset($_SESSION['user_name']) && $_SESSION['user_name']=="admin")
	{
		$x=$_SESSION['user_name'];
		echo "WELCOME ADMIN<br><br><br><br><br><br>";
		echo "<a href='profile.php'>PROFILE</a><br>";
		echo "<a href='d_train.php'>DISPLAY ALL TRAINS</a><br>";	
		echo "<a href='d_book.php'>DISPLAY BOOKINGS</a><br>";
		echo "<a href='d_user.php'>DISPLAY USERS</a><br>";
		echo "<a href='user_add.php'>ADD A NEW USER</a><br>";
		echo "<a href='user_mod.php'>MODIFY USERS</a><br>";	
		echo "<a href='add_train.php'>ADD A NEW TRAIN</a><br>";
		echo "<a href='settings.php'>SETTINGS</a><br>";
		echo "<a href='logout.php'>LOGOUT</a>";
	}
	else
	{
		echo "<script>alert('SESSION EXPIRED!!');
		window.location.href = 'index.html'; </script>";
	}
?>