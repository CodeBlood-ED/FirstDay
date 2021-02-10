<?php

$server = 'localhost';
$uname = 'root';
$pass = '';
$db = 'mydatabase';

$conn = mysqli_connect($server, $uname, $pass, $db)or die('Server Connection Failed...');

if(isset($_POST['register'])){
	$email = $_POST['email'];
	if(empty($email)){
		?><script>alert('Email is required');</script><?php
	}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			?><script> alert('Invalid Email Format');</script><?php
	}
	$password = $_POST['password'];
	$confirm  = $_POST['confirm_password'];
	if($password == $confirm){
		$salt = 'Username22Sep98';
		$newpassword = hash('gost',$password.$salt);
		$uppercase = preg_match('@[A-Z]@',$password);
		$lowercase = preg_match('@[a-z]@', $password);
		$specialchar = preg_match('@[^\w]@', $password);
		if(!$uppercase || !$lowercase || !$specialchar || strlen($password) < 8 ){
			echo 'Passwrd should have atleast 8 characters in length and should include one uppercase, one lowercase, one specialcharacters';
		}else{

			$check = $_POST['check'];
			$gender = $_POST['gender'];
			$numb = $_POST['myselectbox'];
		}

	$q = "INSERT INTO admin (email, password, checkbox, gender, numb) VALUES ('$email', '$newpassword', '$check', '$gender', '$numb')";
	$sql = mysqli_query($conn,$q);

	}else{
		echo "Passwords does not match";
	}
}

?>