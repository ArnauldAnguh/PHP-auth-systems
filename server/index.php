<?php 
// start sessions
	session_start();
// initializing variables
	$firstname = "";
	$lastname = "";
	$username = "";
	$email    = "";
	$errors   = array(); 
// create database connection
	$db = mysqli_connect('127.0.0.1', 'root', '', 'auth') or die("connection failed" . mysqli_error());

// USER REGISTRATION QUERY
if (isset($_POST['register'])) {
	$username = mysqli_real_escape_string($db,$_POST['name']);
	$firstname = mysqli_real_escape_string($db,$_POST['firstname']);
	$lastname = mysqli_real_escape_string($db,$_POST['lastname']);     
	$email = mysqli_real_escape_string($db,$_POST['email']);
	$password = mysqli_real_escape_string($db,$_POST['password']);
	$passwordconf = mysqli_real_escape_string($db,$_POST['passwordconf']);

// Validation
	if(empty($username)) {array_push($errors, 'Name Field Required');}
	if(empty($firstname)) {array_push($errors, 'Firstname Field Required');}
	if(empty($lastname)) {array_push($errors, 'Lastname Field Required');}
	if(empty($email)) {array_push($errors, 'Email Field Required');}
	if(empty($password)) {array_push($errors, 'password Field Required');}
	if($password !== $passwordconf) {array_push($errors, 'passwords do not match!');}

	
//Check if User Already Exists
	$query = "SELECT email FROM users WHERE email = '$email' ";
	$results = mysqli_query($db, $query);

	if($results) {
		if(mysqli_num_rows($results) > 0) {
			array_push($errors, 'This email already exists!');
		} else {
			// if user does not exists then encrypt password and register user
			if(count($errors) === 0) {
				$password = md5($password);
				$query = "INSERT INTO users (name, email, password) VALUES('$username', '$email', '$password')";
				$execute = mysqli_query($db, $query);

				if($execute) {
					$_SESSION['userId'] = mysqli_insert_id($db);
				// Once user is registered, redirect user to home page
					$_SESSION['username'] = $username;
					$_SESSION['email'] = $email;
					$_SESSION['firstname'] = $firstname;
					$_SESSION['lastname'] = $lastname;
					$_SESSION['success'] = 'You Have Been Registered';

					header('location: index.php');
					exit();
				} else {
					array_push($errors, 'Sorry, you have an error.please try again!!');
				}
			}
		}
	}
 	
}

// Set user login 
if(isset($_POST['login'])) {
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	//check validation
	if(empty($email)) { array_push($errors, 'email field required');}
	if(empty($password)) { array_push($errors, 'password field required');}

	if (count($errors) == 0) {
		$password = md5($password);
		$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
		$result = mysqli_query($db, $query);
		
		if($result) {
			if (mysqli_num_rows($result) > 0) {
				$user = mysqli_fetch_assoc($result);
				$_SESSION['userId'] = $user['id'];
				$_SESSION['username'] = $user['name'];
				$_SESSION['email'] = $user['email'];
				$_SESSION['success'] = 'Access Granted!';
				header('location: index.php');
				exit();
			} else {
		  		 array_push($errors, 'user with the email doesnt exists');
			}
		} 
	}
}

// set logout button
if(isset($_GET['logoutId'])) {
	$id = $_GET['logoutId'];
	$query = "DELETE FROM users WHERE id = $id";
	$return = mysqli_query($db, $query);
	if($return) {
		unset($_SESSION['userId']);
		unset($_SESSION['username']);
		unset($_SESSION['email']);
		unset($_SESSION['firstname']);
		unset($_SESSION['lastname']);
		
		$_SESSION['success'] = 'Your Account Has Been Destroyed By You.';
		header('location: ../logout.php');
		exit();
	}
}