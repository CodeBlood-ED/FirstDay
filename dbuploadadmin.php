<?php 


$server = 'localhost';
$uname = 'root';
$pass = '';
$db = 'mydatabase';

$conn = mysqli_connect($server, $uname, $pass, $db)or die('Server Connection Failed...');
		
		if(isset($_POST['submit']) ){
			$email = $_POST['email'];
			if(empty($email)){
				echo 'Email Id Required';
			}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				echo 'Invalid File Format';
			}else{
				$password = $_POST['password'];
				$confirm  = $_POST['confirm_password'];
				if($password == $confirm){
					$salt = 'Username22Sep98';
					$newpassword = hash('gost',$password.$salt);
					$uppercase = preg_match('@[A-Z]@',$password);
					$lowercase = preg_match('@[a-z]@', $password);
					$specialchar = preg_match('@[^\w]@', $password);
					if(!$uppercase || !$lowercase || !$specialchar || strlen($password) < 8 ){
						echo 'Validate Password';
					}else{

						$check = $_POST['check'];
						$gender = $_POST['gender'];
						$numb = $_POST['myselectbox'];

						
						$q ="INSERT INTO admin (email, password, checkbox, gender, numb) VALUES ('$email','$newpassword','$check','$gender','$numb')";
						
						$query = mysqli_query($conn,$q);
				}
				
			

			?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		a{
			display:block;
			width:100px;
			height:100px;
			text-decoration: none;
		}
	</style>
</head>
<body>
	<div>
		<a href="login.php">Login</a>
	</div>
</body>
</html><?php
			}
			else{
				echo 'Password Match Failed' ;
				}
		}
		}
?>
