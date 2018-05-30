<?php

if (isset($_POST['submit'])) {
	require 'dbconnect.php';
	
	$firstname = mysqli_real_escape_string($con, stripslashes($_POST['firstname']));
	$lastname = mysqli_real_escape_string($con, stripslashes($_POST['lastname']));
	$email = mysqli_real_escape_string($con, stripslashes($_POST['email']));
	$username = mysqli_real_escape_string($con, stripslashes($_POST['username']));
	$password = mysqli_real_escape_string($con, stripslashes($_POST['password']));

	//error handlers
	//check for empty field
	if(empty($firstname) || empty($lastname) || empty($email) || empty($username) || empty($password)){
		
		header ("Location: ../index.php?signup=empty");
		exit();
	} else {
		//check if the name is valid
		if (!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname) ) {
			header ("Location: ../index.php?signup=invalid");
			exit();
		} else {
			//check if email is valid
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				header("Location: ../index.php?signup=emailInvalid");
				exit();
			}else{
				$query = "SELECT * FROM users WHERE username = '$username' ";
				$result = mysqli_query($con, $query);
				$numRows = mysqli_num_rows($result);
				//check if the username is already taken
				if($numRows > 0){
					header("Locaiton: ../index.php?signup=useranme_unavailable");
					exit();
				}else{
					//hash the password
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
					//insert to database
					$query = "INSERT INTO users ( first_name, last_name, email, username, password) VALUES ( '$firstname', '$lastname', '$email', '$username', '$hashedPwd')";

					mysqli_query($con, $query);
					header("Location: ../index.php?signup=success");

				}
			}
		}
	}

}else {
	header ("Location: ../index.php");
	exit();
}