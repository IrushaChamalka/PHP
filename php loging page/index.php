<?php
    include_once 'header.php';
?>

    <h2>hello</h2>
    <?php
        if(isset($_SESSION["username"])){
            echo "Welcome ".$_SESSION["username"];
        }else{
            echo "You are not logged in";
        }
    ?>
    

<?php
    include_once 'footer.php';
?>