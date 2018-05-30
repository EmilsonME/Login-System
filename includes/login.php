<?php

if(isset($_POST['submit'])){

	require 'dbconnect.php';
	
	$username = mqsqli_real_escape_string(stripslashes($_POST['username']));
	$password = mqsqli_real_escape_string(stripslashes($_POST['password']));
	echo "<h1> asdasd </h1>";
	//error handlers
	if(empty($username) || empty($password)){
		header ("Location: ../index.php?login=empty");
		exit();
	} else {
		$query = "SELECT * FROM users WHERE username = '$username'";
		$result = mysqli_query($con, $query);
		$resultNumRows = mysqli_num_rows($result);

		if($resultNumRows < 1){
			header("Location: ../index.php?login=error");
			exit();
		}else {	
			if ($row = mysqli_fetch_assoc($result)) {

				echo $row['username'];
			}
		}
	}
}else{
	header("Location: ../index.php?login=error");
	exit();
}