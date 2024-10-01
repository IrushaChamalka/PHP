<?php
session_start();

if(isset($_SESSION['username']))
{
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="loginstyle.css">
    </head>
    <body>

    <h1>Hello,<?php echo $_SESSION['username']; ?> </h1>
    <a href="logout.php">LOGOUT</a>

    </body>
    </html>
<?php

}else{
    header('location: index.php');
    exit();
}
?>