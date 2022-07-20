<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="">
</head>

<body>
    <!-- <p>Welcome User!</p> -->

    <!-- <a href="register.php">Register new account</a> -->

    <p>
       <?php
        session_start();

// This if else statment redirects the user if they aren't logged in.
       if (isset($_SESSION['username'])){

            echo "Welcome: " . $_SESSION['fname'];

       } else {
           echo header("Location: login.php");
       }

        ?>
    </p>

    <a href="changeacc.php">Change Login Info </a> <br/> <br/>

    <a href="createquiz.php">Create a quiz </a> <br/> <br/>

    <a href="asnwerquiz.php">Answer a quiz </a> <br/> <br/>



    <a href="logout.php">Logout</a> <br/> <br/>
    






    <script src=""></script>
</body>
</html>
