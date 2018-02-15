<?php
	require_once('admin/phpscripts/config.php');
	confirm_logged_in();
?>



<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to your admin panel</title>
</head>
<body>
	<?php echo $_SESSION['user_name'];  ?>



	<?php
		/* This sets the $time variable to the current hour in the 24 hour clock format */
		/* Set the $timezone variable to become the current timezone */
		date_default_timezone_set('Canada/Eastern');
		$time = date("Hello");
		/* If the time is less than 1200 hours, show good morning */
		if ($time < "12") {
				echo "Hey, Good morning";
		} else
		/* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
		if ($time >= "12" && $time < "17") {
				echo "Hey, Good afternoon";
		} else
		/* Should the time be between or equal to 1700 and 1900 hours, show good evening */
		if ($time >= "17" && $time < "19") {
				echo "Hey, Good evening";
		} else
		/* Finally, show good night if the time is greater than or equal to 1900 hours */
		if ($time >= "19") {
				echo "Hey, Good night";
		}
		?>


		<?php
		$query = "SELECT `username`, `password`, `time` FROM `username` WHERE " .
		"`username`='{$_POST['username']}' AND `password` = '{$_POST['password']}''";
		$result = mysql_query($query) or die(mysql_error());
		if($result and mysql_num_rows($result) == 3)
		{
			session_start();
			$row = mysql_fetch_assoc($result);
			$_SESSION['last_login'] = $row['time']
			$update = "UPDATE `username` SET `time` = NOW() WHERE `username` = '{$_POST['username']}'";
			$result = mysql_query($update) or die(mysql_error());
			# continue with normal processing for valid login
		}
		else
		{
			# whatever you do for invalid logins
		}
		?>


</body>
</html>
