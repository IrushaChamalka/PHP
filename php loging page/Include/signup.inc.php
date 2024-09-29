<?php
if($_POST['submit']){//post eken pwd pennene na
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdrepeat'];//singup.php eken pass kargannwa

    require_once 'dbh.inc.php';
    require_once 'function.inc.php';

    $emptyInput = emptyInputSignup($name,$email,$username,$pwd,$pwdRepeat);
    $invalidUid = invalidUid($username);
    $invalidEmail = invalidEmail($email);
    $pwdMatch = pwdMatch($pwd,$pwdRepeat);// $pwdMatchd kiyala balanna 
    $uidExist = uidExist($conn,$username,$email);//already uid aran thiyenwada balanwa

    if($emptyInput !== false){ 
        header('location:../singup.php?error=emptyinputs');
        exit();
    }
    if($invalidEmail !== false){ 
        header('location:../singup.php?error=invalidemail');
        exit();
    }
    if($invalidUid !== false){ 
        header('location:../singup.php?error=invaliduid');
        exit();
    }
    if($pwdMatch !== false){ 
        header('location:../singup.php?error=passwordnotmatched');
        exit();
    }
    if($uidExist !== false){ 
        header('location:../singup.php?error=usernametaken');
        exit();
    }

    createUser($conn,$name,$email,$username,$pwd);

}else{
    header('location:../loging.php');//link search block karanwa
    exit();
}