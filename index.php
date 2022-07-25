<?php
include "includes/db.php";
include "includes/functions.php";
session_start();

if(isset($_POST['login'])) {
	$username = $_POST['user'];
	$password = $_POST['password'];

	$username = mysqli_real_escape_string($connection, $username);
	$password = mysqli_real_escape_string($connection, $password);

	$query = "SELECT * FROM accounts WHERE username = '{$username}' ";
	$select_user_query = mysqli_query($connection, $query);

	if(!$select_user_query) {
		die("Query in loginphp failed" . mysqli_error($connection) );
	}

	while($row = mysqli_fetch_array($select_user_query)){
		$infoid = $row['id'];
		$infoemail = $row['email'];
		$infousername = $row['username'];
		$infopassword = $row['password'];
		$infotime = $row['timecreated'];
	


		$entereduser = $_POST['user'];
		$enteredpass = $_POST['password'];

		echo "Account information:" . "<br>";
		echo "Username is: [" . $infousername . "]" . "<br>" ;
		echo "Password is: [" . $infopassword . "]" . "<br>" . "<br>" ;
		echo "Your entered Password is: [" . $enteredpass . "]" . "<br>" . "<br>";

		if($entereduser == $infousername && $enteredpass == $infopassword){
			$_SESSION['id'] = $infoid;
			$_SESSION['email'] = $infoemail;
			$_SESSION['username'] = $infousername;
			$_SESSION['password'] = $infopassword;
			$_SESSION['fname'] = $infofname;
			$_SESSION['timecreated'] = $infotime;




			//redirects you to homepage
			header("Location: home.html");

		} else if ($entereduser !== $infousername && $enteredpass !== $infopassword) {
			echo "Invalid login details";

		}
//            else {
//                echo "wrong login information" . "<br>" . "<br>";
//            }

//            if($username !== $infopassword && $password !==$infopassword){
//                header("Location: login.php");
//            }
	}


}

else {
	echo "Input user details to login" . "<br>" . "<br>";


}
?>



<!DOCTYPE  html>
<html>
<head>
	<title>IMS Login Inventory Management System</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
	<div class="container">

		<div class="loginBody">
			<form action="" method="post">
				<div class="loginButtonContainer">
				<?php   insert_categories();    ?>


				<img class="logo" src="images/matoswaterlogin.jpeg" alt="LOGO">


				<div class="loginInputsContainer">
					<label for="">Username</label>
					<input placeholder="Username"type="text" name="user" required/>
				</div>


				<div class="loginInputsContainer">
					<label for="">Email</label>
					<input placeholder="Email"type="text" name="email" required/>
				</div>


				<div class="loginInputsContainer">
					<label for="">Password</label>
					<input placeholder="Password"type="password" name="password" required/>
				</div>

				<div class="loginButtonContainer">

                        <input class="btn btn-primary" type="submit" value="Register" name="regacc">
					
						<input class="btn btn-primary" type="submit" name="login" value="Login" name="regacc">
					
			
				</div>



			</form>  
		</div>
	</div>
</body>
</html>

