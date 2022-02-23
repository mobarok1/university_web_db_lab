<?
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        if(isset($_GET["cart"])){
            

        }else if(isset($_GET["category"])){

           
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
        <?php 
            if(isset($_SESSION["AdminLogged"]) && $_SESSION["AdminLogged"]===true)
            {?>
                <h3>Welcome Back <?php echo $_SESSION["AdminUserName"];?></h3>
            <?php } 
            else{?>
                     <h3>Please Sigin First</h3>
            <?php } ?>
    <body>
</html>