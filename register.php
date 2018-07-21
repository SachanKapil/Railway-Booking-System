<html>
	<head>
	</head>
	<body>
		<form method="POST" action="register_confirm.php">
			User Name: <input type="text" name="user_name"><br>
			Password: <input type="password" name="password"><br>
			Gender: <select name="gender">
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						<option value="Transgender">Transgender</option>
					</select><br>
			Nationality: <input type="radio" name="nation" value="Indian">Indian<br>&emsp;&emsp;&emsp;&emsp;&emsp;
						 <input type="radio" name="nation" value="Others">Others<br>
			Mobile No: <input type="text" name="mobile"><br>
			<input type="submit" value="REGISTER">
		</form>
	</body>
</html>