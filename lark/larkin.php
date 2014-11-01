<?php
 include("connect.php");

$error = "";

if (isset($_POST['username']) && isset($_POST['password'])) {
 	$username = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]);
 	$password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]);

    $password_md5 = md5($password);
    $sql_prep = "SELECT `id` FROM `users` WHERE username='$username' AND password='$password_md5' LIMIT 1";
    $sql = mysql_query($sql_prep);
        
    $userCount = mysql_num_rows($sql);
	if ($userCount == 1) {
		while($row = mysql_fetch_array($sql)) {
			$id = $row["id"];
		}

		$_SESSION["user_login"] = $username;
		header("location: index.php");
		exit();
	} else {
		echo 'This information is incorrect, try again.';
		exit();
	}

}
?>
<div class="main">
	<h1>Larker Login</h1>
		<form action="larkin.php" method="POST">
            <?php echo $error; ?>
			<input type="text" placeholder="Name I.E. JohnDoe" name="username" size="25">
			<input type="password" placeholder="Student ID I.E. 1234(56)" name="password" size="25">
            <input type="submit" name="login" value="Login" />
		</form>
    </div>
	</body>
</html>