<?php include_once "config/db.php"?>
<?php
if(session_status()===PHP_SESSION_NONE){
    session_start();
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["submit"])){
        $userName=$_POST["userName"];
        $userPassword=$_POST["password"];
        $sql = "SELECT * from user where `user_name` ='$userName' AND `password`='$userPassword' AND `user_type`=1";
        $result = $connection->query($sql);
        if($result->num_rows > 0){
            echo "Login Success";
            $_SESSION["AdminLogged"] = true;
            $_SESSION["AdminUserName"] = $userName;
        }else{
            echo "Failed to Login";
        }
    }
    
}
?>
<html>
<head>
    <title>Lab Test</title>
    <link rel="stylesheet" href="css/style.css">
<head>
<body>
    <?php include "includes/navigation.php";?>
    <h3>Admin Sign in</h3>
    <form action="" method="POST">
        <input type="text" name="userName">
        <input type="password" name="password">
        <input type="submit" name="submit" id="submit">
    </form>
<body>
</html>
<?php $connection->close()?>