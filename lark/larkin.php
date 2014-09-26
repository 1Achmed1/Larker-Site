<?php
 include("connect.php");

 if (isset($_POST['username']) && isset($_POST['password'])) {
 	$username = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]);
 	$password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]);

 	$salt = "24ihg";
 	$password_md5 = md5($salt . md5($password));
 	$sql_prep = "SELECT id FROM users WHERE username='$username' AND password='$password_md5' LIMIT 1";
 	$sql = mysql_query($sql_prep);

 	$userCount = mysql_num_rows($sql);
	if ($userCount == 1) {
		while($row = mysql_fetch_array($sql)) {
			$id = $row["id"];
		}

		$_SESSION["user_login"] = $user_login;
		header("location: portal.php");
		exit();
	} else {
		echo 'This information is incorrect, try again.';
		exit();
	}
 }
?>
<html>
	<body>
	<h1>Larker Login</h1>
		<form action="larkin.php" method="POST">
			<input type="text" placeholder="Username" name="username" size="25">
			<input type="password" placeholder="Password" name="password" size="25">
		</form>
		<footer>Mode: Encrypted, Access: Restricted.</footer>
	</body>
</html>