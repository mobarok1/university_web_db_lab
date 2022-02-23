<?php include_once "./config/db.php"?>

<div class="navbar">
    <ul>
    <li><a href="index.php">Home</a></li>
        <?php
            if(session_status()=== PHP_SESSION_NONE){
                session_start();
            }
        if(isset($_SESSION["AdminLogged"]) && $_SESSION["AdminLogged"]===true)
            {?>
                <li><a href="category.php">Categories</a> </li>
                <li><a href="product.php">Products</a></li>
                <li><a href="logout.php">Log Out</a></li>
        <?php } 
        else{?>
                <li><a href="signin.php">Sign In</a></li>
        <?php } ?>
    </ul>
</div>
