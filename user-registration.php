<!DOCTYPE html>
<html>
<head>
	<title>Techmonastic Solution Form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$("form").on("Register",function(event){
			event.preventDefault();

			var formValues = $(this).serialize();

			$.post("dbupload.php",formValues,function(data){
				$("#result").html(data);
			});
		});
	});
</script>
</head>
<body>
	 <div class="form">
	 	<p id="result"></p>
		<form action="dbupload.php" method="post" enctype="multipart/form-data">
			<h1>User-Registration</h1>
			
			<input type="text" name="useremail" placeholder="Email" autocomplete="off" required><br>
			<input type="password" name="userpassword" placeholder="Password" autocomplete="off" required><br>
			<input type="password" name="userconfirm_password" placeholder="Confirm Password" autocomplete="off" required><br>
			<input type="checkbox" name="usercheck" value="Adult" id="adult">
			<label for="adult">Adult</label>
			<input type="checkbox" name="usercheck" value="Child" id="child">
			<label for="child">Child</label><br><br>
			<input type="radio" id="male" name="usergender" value="M" required>
            <label for="male">Male</label>
            <input type="radio" id="female" name="usergender" value="F" required>
            <label for="female">Female</label><br><br>
            <select name="usermyselectbox" required>
                <option name="option1" value="one" >1</option>
                <option name="option2" value="two" >2</option> 
            </select>
            <br><br>
            <label>Update Profile Image </label><br><br>
            <input type="file" name="image" style="width: 300px;height:50px;font-size: 20px;display: block;position: relative;left:70px;font-weight: bold;" required><br><br>
            <input type="submit" name="submit" value="Register" style="width: 100px;height:50px;font-size:18px;background-color: white;border-radius: 5px;">


		</form>
	</div>

</body>
</html>	


	
