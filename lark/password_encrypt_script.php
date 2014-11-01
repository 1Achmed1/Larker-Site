<?php
$submit = @$_POST['submit'];
$result = "";

if($submit){
	$result = "";
	if (isset($_POST['password'])) {
		$password = $_POST['password'];
		$result = md5($password);
	}
}
?>
<form action="password_encrypt_script.php" method="POST">
	<?php echo $result; ?>
	<input type="password" placeholder="password" name="password" length="25" />
    <input type="submit" name="submit" value="Submit" />
</form>