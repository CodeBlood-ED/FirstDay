<?php 


$server = 'localhost';
$uname = 'root';
$pass = '';
$db = 'mydatabase';

$conn = mysqli_connect($server, $uname, $pass, $db)or die('Server Connection Failed...');
		
		if(isset($_POST['submit']) ){
			$useremail = $_POST['useremail'];
			if(empty($useremail)){
				echo 'Email Id Required';
			}else if(!filter_var($useremail,FILTER_VALIDATE_EMAIL)){
				echo 'Invalid File Format';
			}else{
				$userpassword = $_POST['userpassword'];
				$userconfirm  = $_POST['userconfirm_password'];
				if($userpassword == $userconfirm){
					$salt = 'Username22Sep98';
					$usernewpassword = hash('gost',$userpassword.$salt);
					$uppercase = preg_match('@[A-Z]@',$userpassword);
					$lowercase = preg_match('@[a-z]@', $userpassword);
					$specialchar = preg_match('@[^\w]@', $userpassword);
					if(!$uppercase || !$lowercase || !$specialchar || strlen($userpassword) < 8 ){
						echo 'Validate Password';
					}else{

						$usercheck = $_POST['usercheck'];
						$usergender = $_POST['usergender'];
						$usernumb = $_POST['usermyselectbox'];

						$files = $_FILES['image'];
						$filename = $files['name'];
						$filetmpname = $files['tmp_name'];

						$fileext = explode('.',$filename);
						$filecheck = strtolower(end($fileext));

						$extstore = array('png', 'jpg', 'jpeg');
						if(in_array($filecheck, $extstore)){
							$destinationfile = 'images/'.$filename;
							move_uploaded_file($filetmpname, $destinationfile);
						}
						$q ="INSERT INTO user (useremail, userpassword, usercheckbox, usergender, usernumb, userimage) VALUES ('$useremail','$usernewpassword','$usercheck','$usergender','$usernumb', '$destinationfile')";
						
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
		<a href="index.php">Login</a>
	</div>
</body>
</html>	<?php
			}
			else{
				echo 'Password Match Failed' ;
				}
		}
		}
?>
