<?php
if($_POST['submit']){//post eken pwd pennene na
    
    $username = $_POST['uid'];
    $pwd = $_POST['pwd'];//login.php eken pass kargannwa

    require_once 'dbh.inc.php';
    require_once 'function.inc.php';

    if(emptyInputLogin($username,$pwd) !== false){ //hariyatama check karanwa username,passward input karanwada kiyala.nathnm reject karanwa 
        exit();
    }

    LoginUser($conn,$username,$pwd);

}else{
    header('location:../loging.php');//link search block karanwa
    exit();
}