<?php

$serverName = "localhost"; //php myadmin eke privilage walin ganne
$dbUserName = "user123";
$dbPassword = "XSl6ZRNA23UAU801";
$dbName = "slgeek";

$conn = mysqli_connect($serverName,$dbUserName,$dbPassword,$dbName);//connection ek hadanwa

if(!$conn){ //debugging walata
    die("Connection failed:" .mysqli_connect_error());
}