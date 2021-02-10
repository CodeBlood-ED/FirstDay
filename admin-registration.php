<!DOCTYPE html>
<html>
<head>
	<title>Techmonastic Solution Form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="form">
		<form action="" method="post" enctype="multipart/form-data">

			<h1>Admin-Registration</h1>
			
			<input type="text" name="email" placeholder="Email" autocomplete="off"><br>
			<input type="password" name="password" placeholder="Password" autocomplete="off"><br>
			<input type="password" name="confirm_password" placeholder="Confirm Password" autocomplete="off"><br>
			<input type="checkbox" name="check" value="Adult" id="adult">
			<label for="adult">Adult</label>
			<input type="checkbox" name="check" value="Child" id="child">
			<label for="child">Child</label><br><br>
			<input type="radio" id="male" name="gender" value="M">
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="F">
            <label for="female">Female</label><br><br>
            <select name="myselectbox">
                <option name="option1" value="one">1</option>
                <option name="option2" value="two">2</option> 
            </select>
            <br><br>
            <input type="submit" name="register" value="Register" style="width: 100px;height:50px;font-size:18px;background-color: white;border-radius: 5px;">


		</form>

	</div>

</body>

</html>


