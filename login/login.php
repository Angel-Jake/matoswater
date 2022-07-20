<?php
include "includes/db.php";
session_start();

    if(isset($_POST['login'])) {
        $username = $_POST['username'];
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
            $infofname = $row['fname'];


            $entereduser = $_POST['username'];
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
                header("Location: homepage.php");

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
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div class="login-box">
            <div class="row">
                <div class="col-md-6 login-left">

                    <h3>Login Here</h3>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" required >
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required >
                        </div>

                        <input class="btn btn-primary" type="submit" name="login" value="login" >

                    </form>


                    
                </div>

            </div>

        </div>
    </div>
</body>

</html>

