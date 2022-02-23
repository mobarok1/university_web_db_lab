<?php include_once "./config/db.php"?>


<div class="navbar">
    <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="#">Category</a>
        <ul>
        <?php 
            $sql = "SELECT * from category";
            $result = $connection->query($sql);
          //  $row = fetch_assoc($result);
          //  $row = $result->fetch_assoc()
            while($row = $result->fetch_assoc()){
            ?>
               <li>
                   <a href='index.php?category=<?php echo $row['id'];?>'><?php echo $row['name'];?></a></li>
            <?php } ?>
        </ul>
    </li>
        <?php
            if(session_status()=== PHP_SESSION_NONE){
                session_start();
            }
        if(isset($_SESSION["Logged"]) && $_SESSION["Logged"]===true)
            {?>
            
                <li><a href="cart.php">Cart Page</a></li>
                <li><a href="logout.php">Logout</a></li>
        <?php } 
        else{?>
                  <li><a href="admin/signin.php">Admin</a></li>
                <li><a href="signin.php">Sign In</a></li>
                <li><a href="signup.php">Sign Up</a></li>
        <?php } ?>
    </ul>
</div>
