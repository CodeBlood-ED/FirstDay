<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>


<?php 

	$server = 'localhost';
	$username = 'root';
	$password = '';
	$db = 'mydatabase';

	$conn = mysqli_connect($server,$username,$password,$db);

	if(isset($_POST['submit'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

		$salt = 'Username22Sep98';
		$password1 = hash('gost',$password.$salt);

		$query = "SELECT password FROM admin where email='$email'";

		$result = mysqli_query($conn,$query);

		$fetch = mysqli_fetch_array($result);

		$data = $fetch['password'];
		if($password1 == $data){
			$query = "SELECT * FROM user";

			$result = mysqli_query($conn,$query);

			while($resultdisplay = mysqli_fetch_array($result)){
				?>
					<body>
						<tbody>
							
							<tr>
								<td><img src="<?php echo $resultdisplay['userimage']; ?>" height="100px" width="100px"></td>
							</tr>

						</tbody>
					</body>
				<?php
			}


		}else{
			echo "Password Match Failed";
		}


	}
 ?>
 </html>