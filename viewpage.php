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

		$sql = "SELECT password FROM user where email='$email'";
		$qry = mysqli_query($conn,$sql);

		$fetch = mysqli_fetch_array($qry);

		$data = $fetch['password'];

		if($data == $password1){

			$sql = "SELECT * FROM user";

			$qry = mysqli_query($conn,$sql);

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