<?php
    include ("db_conn.php");

    if(empty($_POST['username']) || empty($_POST['password'])) {
        echo "Enter Username and Password";
    }else{
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT uid FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($db, $sql);
        if(mysqli_num_rows($result)==1){
            header("Location: showbugs.php");
        }else{
            echo "Incorrect username and password" . mysqli_error();
        }
    }
?>