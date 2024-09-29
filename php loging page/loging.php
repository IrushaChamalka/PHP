<?php
    include_once 'header.php';
?>

    <div class="form">
        <form action="Include/login.inc.php" method="post">
            
            <input type="text" id="fname" name="uid" placeholder="Email/ user name">

            <input type="password" id="lname" name="pwd" placeholder="Password">
        
            <button name="button" type="submit">Login</button>
        </form>
        <p>New here ? <a href="singup.php">Register</a> </p>
    </div>

    
    

<?php
    include_once 'footer.php';
?>