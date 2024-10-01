<?php
session_start();
include "db_connection.php";
$user = $_POST['username'];
$password = $_POST['password'];

if(isset($_POST['username']) && isset($_POST['password'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $user = validate($_POST['username']);
    $pwd = validate($_POST['password']);

    if(empty($user) && empty($pwd)){
        header('location:index.php?error=username or password not found');
        exit();
    }else{
        $sql = "SELECT * FROM login WHERE username='$user' AND password='$pwd';";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if($row['username'] === $user && $row['password'] === $pwd){
                echo "Logged In !";
                $_SESSION['username'] = $row['username'];
                header("location: home.php");
                exit();
            }else{
                header('location:index.php?error=incorrect username or password');
                exit();
            }
        }else{
            header('location:index.php?error=username or password not found');
            exit();
        }
    }
}else{
    header('location:index.php?error=please fill in the required fields');
    exit();
}