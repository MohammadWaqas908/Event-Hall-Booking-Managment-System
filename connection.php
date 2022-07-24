<?php
	$conn=mysqli_connect('localhost','root','','nehbms');
	if ($conn->connect_error) {
		die("Connection_error : . $conn->connect_error ");
	}
?>