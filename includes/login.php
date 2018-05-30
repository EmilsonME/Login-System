<?php
session_start();
if(isset($_POST['submit'])){

	require 'dbconnect.php';
	
	$username = mysqli_real_escape_string($con, stripslashes($_POST['username']));
	$password = mysqli_real_escape_string($con, stripslashes($_POST['password']));
	
	//error handlers

	if(empty($username) || empty($password)){
		header ("Location: ../index.php?login=empty");
		exit();
	} else {
		$query = "SELECT * FROM users WHERE username = '$username' OR email = '$username' ";
		$result = mysqli_query($con, $query);
		$resultNumRows = mysqli_num_rows($result);
		if (!$result) {
			echo "Erorr: ". mysqli_error($con);
		}
		else{

			if($resultNumRows < 1){
				header("Location: ../index.php?login=error");
				exit();
			}else {	
				if ($row = mysqli_fetch_assoc($result)) {
					//de-hash password and check if the inputted password is correct;
					$hashedPasswordCheck = password_verify($password, $row['password']);

					if(!$hashedPasswordCheck){
						header("Location: ../index.php?login=error");
						exit();
					}elseif($hashedPasswordCheck){
						$_SESSION['username'] = $row['username'];
						$_SESSION['firstname'] = $row['first_name'];
						$_SESSION['lastname'] = $row['last_name'];
						$_SESSION['email'] = $row['email'];
						header("Location: ../index.php?login=success");
						exit();
					}
				}
			}
		}
	}
}else{
	header("Location: ../index.php?login=error");
	exit();
}