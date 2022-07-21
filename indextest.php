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



<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>IMS Login Inventory Management System</title>
      <link rel="stylesheet" href="style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>

      <div class="wrapper">
         <div class="title-text">
            <div class="title login">
               Mato's Water Login
            </div>
            <div class="title signup">
               Mato's Water Signup
            </div>
         </div>
      
			
            <div class="form-inner">
            <form action="" method="post">
				<div class="loginButtonContainer">
				<?php   insert_categories();    ?>


				<div class="loginButtonRegisterhere">
					<h1>Register Here! </h1>

				</div>


				<div class="loginInputsContainer">
					<label for="">Username</label>
					<input placeholder="username"type="text" name="user" required/>
				</div>


				<div class="loginInputsContainer">
					<label for="">Email</label>
					<input placeholder="email"type="text" name="email" required/>
				</div>


				<div class="loginInputsContainer">
					<label for="">Password</label>
					<input placeholder="password"type="password" name="password" required/>
				</div>

				<div class="loginButtonContainer">
            <div class="field-btn">

                        <input class="btn btn-primary" type="submit" value="Register" name="regacc">

					
					<h4>Or</h4>
					
						<input class="btn btn-primary" type="submit" name="login" value="Login" name="regacc">
					
			
				</div>



			</form>  
            </div>
         </div>
      </div>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });
      </script>
   </body>
</html>