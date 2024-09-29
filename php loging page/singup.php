<?php
    include_once 'header.php';
?>

    <div class="form">
        <form action="Include/signup.inc.php" method="post">
            
            <input type="text" id="fname" name="name" placeholder="Name">
            <input type="text" id="fname" name="email" placeholder="Email">
            <input type="text" id="fname" name="uid" placeholder="User name">
            <input type="password" id="lname" name="pwd" placeholder="Password">
            <input type="password" id="lname" name="pwdrepeat" placeholder="Repeat Password">
        
            <button name="button" type="submit">Register</button>
        </form>
        <p>Already have a account ? <a href="loging.php">Log in</a> </p>
    </div>

    
    

<?php
    include_once 'footer.php';
?>