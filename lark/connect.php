<?php
	mysql_connect("127.0.0.1","root","") or die("<h1>Couldn't connent to SQL. Please check login creds.</h1>");
	mysql_select_db("lark") or die("Couldn't find the database. Please check your login credentials.");
    $mysql_user_table_create = ("CREATE TABLE IF NOT EXISTS `users` (`id` int(15) NOT NULL, `username` varchar(255) NOT NULL, `password` varchar(255) NOT NULL, `email` varchar(255) NOT NULL, `yog_long` varchar(255) NOT NULL, `yog_short` varchar(255) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2") or die ("Could not create database.");

session_start();
if(!isset($_SESSION["user_login"])) {
	$user = "";
} else {
	$user = $_SESSION["user_login"];
}


?>
<!DOCTYPE html>
<html>
	<head>
		<title>WMS LARKer Team Site</title>
		<link rel="stylesheet" href="style.css" media="screen" />
        <!--[if ie]>It appears you are using IE 9 or earlier. Please use a <b>modern</b> browser like Chrome or Firefox.</p><![endif]-->
	</head>
	<body>
		<header>
			<nav>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="#">FAQ</a></li>
					<li><a href="#">About Us</a></li>
                    <li><a href="#">LARKer Information</a></li>
					<li><?php if(!$user) {
                            echo '<a href="larkin.php">LARKer Login</a>';
                        } else {
                            echo '<a href="larkerhp.php">LARKer Homepage</a>';
                    }?></li>
                    <li><a href="contact.php">Contact Us</a></li>
				</ul>
			</nav>
            <center><img src="logo.png" /></center>
		</header>
        <footer>
            &copy; 2014 Wayland Middle School and the LARKer Club. <br />
            <a href="mailto:stacey_reed@wayland.k12.ma.us" target="_top" class="footer-link">Send an email to Ms. Reed</a>
			<a href="mailto:sara_ravid@wayland.k12.ma.us" target="_top" class="footer-link">Send an email to Ms. Ravid</a><br />
            Site made with blood, sweat, and tears by the AW's. <br />
            <?php
                if(!$user) {
                    echo "Not signed in.";
                } else {
                    echo "Signed in as " . $user . ". <a href='logout.php'>Log Out</a>.";
                }
            ?>
        </footer>
        <div class="main">
            