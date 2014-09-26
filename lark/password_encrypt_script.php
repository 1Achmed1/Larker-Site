<?php
	$result = "";
	if (isset($_POST['password'])) {
		$password = $_POST['password'];
		$salt = "24ihg";
		$result = md5($salt . md5($password));
	}
?>
<form action="password_encrypt_script.php" method="POST">
	<?php $result ?>
	<input type="password" placeholder="password" name="password" length="25"/>
</form>