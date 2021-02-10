<?php

$server = 'localhost';
$uname = 'root';
$pass = '';
$db = 'mydatabase';

$conn = mysqli_connect($server, $uname, $pass, $db)or die('Server Connection Failed...');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Techmonastic Solution Form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php 
		if(isset($_POST['userregister'])){
			$useremail = $_POST['useremail'];
			if(empty($useremail)){
				?><script>alert('Email is required');</script><?php
			}else if(!filter_var($useremail,FILTER_VALIDATE_EMAIL)){
				?><script> alert('Invalid Email Format');</script><?php
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
						echo 'Passwrd should have atleast 8 characters in length and should include one uppercase, one lowercase, one specialcharacters';
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

							$q ="INSERT INTO user (useremail, userpassword, usercheckbox, usergender, usernumb, userimage) VALUES ('$useremail','$usernewpassword','$usercheck','$usergender','$usernumb', '$destinationfile')";
							$query = mysqli_query($conn,$q);
						}
					}?>
					<div>
		
					<h1>Account Created</h1>
					<a href="login.php"><button type="button" style="width:100px;height: 50px;background-color: white; margin-left:65px;font-weight:bold;">Login Now</button></a>

					</div>
					<?php
				}
				else{
				echo "Passwords does not match";
				}
			}
		} else {
		?>
	

	<div class="form">
		<form action="" method="post" enctype="multipart/form-data">

			<h1>User-Registration</h1>
			
			<input type="text" name="useremail" placeholder="Email" autocomplete="off"><br>
			<input type="password" name="userpassword" placeholder="Password" autocomplete="off"><br>
			<input type="password" name="userconfirm_password" placeholder="Confirm Password" autocomplete="off"><br>
			<input type="checkbox" name="usercheck" value="Adult" id="adult">
			<label for="adult">Adult</label>
			<input type="checkbox" name="usercheck" value="Child" id="child">
			<label for="child">Child</label><br><br>
			<input type="radio" id="male" name="usergender" value="M">
            <label for="male">Male</label>
            <input type="radio" id="female" name="usergender" value="F">
            <label for="female">Female</label><br><br>
            <select name="usermyselectbox">
                <option name="option1" value="one">1</option>
                <option name="option2" value="two">2</option> 
            </select>
            <br><br>
            <label>Update Profile Image </label><br><br>
            <input type="file" name="image" style="width: 300px;height:50px;font-size: 20px;display: block;position: relative;left:70px;font-weight: bold;"><br><br>
            <input type="submit" name="userregister" value="Register" style="width: 100px;height:50px;font-size:18px;background-color: white;border-radius: 5px;">


		</form>
	</div>

</body>
</html>	

	<?php
}
	?>
	
