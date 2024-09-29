<?php

//Signup ekata 

function emptyInputSignup($name,$email,$username,$pwd,$pwdRepeat){

    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
        return true;
    }
    return false;
}

function invalidUid($username){

    if(!preg_match('/^[a-zA-z0-9]*$/',$username)){
        return true;
    }
    return false;
}

function invalidEmail($email){

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){ // email check karanna thiyena build in functions
        return true;
    }
    return false;
}

function pwdMatch($pwd,$pwdRepeat){
    if($pwd !== $pwdRepeat){
        return true;
    }
    return false;
}

function uidExist($conn,$username,$email){

    $sql = "SELECT * FROM users WHERE userId = ? OR userEmail = ?;";

    $statement = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($statement, $sql)){
        header ('location:../singup.php?error=statementfailed');
        exit();  
    }

    mysqli_stmt_bind_param($statement, "ss" ,$username, $email);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);

    if($row = mysqli_fetch_assoc($result)){
        return $row;
    }
    return false;

    mysqli_stmt_close($statement);
}

function createUser($conn,$name,$email,$username,$pwd){
    $sql = "INSERT INTO users (userName, userEmail, userUid, userPwd) VALUES (?,?,?,?);";

    $statement = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($statement, $sql)){
        header ('location:../singup.php?error=statementfailed');
        exit();  
    }

    $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($statement, "ssss" ,$name,$email,$username,$hashedPwd);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header('location:../singup.php?error=none');
    exit();
}

//login ekata

function emptyInputLogin($username,$pwd){

    if (empty($username) || empty($pwd)){
        return true;
    }
    return false;
}

function LoginUser($conn,$username, $pwd){
    $uidExist = uidExist($conn, $username ,$username);
    if($uidExist === false){
        header('location:../login.php?error=wronglogin');
        exit();
    }
    $pwdHashed = $uidExist["userPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header('location:../singup.php?error=wronglogin');
        exit();
    }else if($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExist["userID"];
        $_SESSION["useruid"] = $uidExist["userUid"];
        $_SESSION["username"] = $uidExist["userName"];
        header("location:../index.php");
        exit();
    }
}