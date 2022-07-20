<?php
include "includes/db.php";
include "includes/functions.php";
?>



<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!--    <link rel="stylesheet" type="text/css" href="style.css">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
    <script src=""></script>

    <div class="container">
        <div class="login-box">
            <div class="row">
                <div class="col-md-6 login-left">

                    <?php   insert_categories();    ?>

                    <h3>Register Here</h3>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="user" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>email</label>
                            <input type="text" name="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="fname" class="form-control" required>
                        </div>


                        <input class="btn btn-primary" type="submit" name="regacc" value="register">

                    </form>

                    <form action="login.php">
                        <input class="btn btn-primary" type="submit" value="login instead" >
                    </form>

                </div>

            </div>
        </div>
    </div>

</body>

</html>
