<?php
	mysql_connect("127.0.0.1","root","") or die("<h1>Couldn't connent to SQL. Please check login creds.</h1>");
	mysql_select_db("lark") or die("Couldn't find the database. Please check your login credentials.");
?>