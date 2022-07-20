<?php

function insert_categories() {
    // Need to make the connection global for this to have access to $global
    global $connection;

     if(isset($_POST['regacc'])){
         echo "Changes have been made to the database";

        $username = $_POST['user'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $fname = $_POST['fname'];

        if($username == "" || empty($username)){
                echo "<br>" . "<br>" . "This field should not be empty";
        } else {

            $query = "INSERT INTO accounts(username,password,email,fname) VALUE('{$username}','{$password}','{$email}','{$fname}') ";
            $create_category_query = mysqli_query($connection, $query);

            if(!$create_category_query){
             die("FAILLLEDD" . mysqli_error($connection));
                }

        }

     }
//      else {
//         echo "Please register an account";
//     }
}


function clear_session() {

    $_SESSION['id'] = null;
    $_SESSION['username'] = null;
    $_SESSION['password'] = null;
    
    header("Location: login.php");

    
}




function addquiz() {

    global $connection;

    if(isset($_POST['savequiz'])) {

        




    }





}

























?>
