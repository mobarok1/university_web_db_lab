<?php include_once "config/db.php"?>
<?php
if(session_status()===PHP_SESSION_NONE){
    session_start();
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["Add"])){
        $catName=$_POST["catName"];
        $sql = "INSERT into `category` (`name`) VALUES('$catName')";
            if($connection->query($sql) == true){
            echo "Successfully Category Added";
            }else{
                echo $connection->error;
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
    <h3>Add New Category</h3>
    <form action="" method="POST">
        <input type="text" name="catName">
        <input type="submit" name="Add" id="submit">
    </form>
    <h3>All Category</h3>


    <table border="2">
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
    
    <?php
            $sql = "SELECT * from category";
            $result = $connection->query($sql);
            while($row = $result->fetch_assoc()){
            ?>
             <tr>
                <th><?php echo $row["id"]?></th>
                <th><?php echo $row["name"]?></th>
            </tr>
        
        <?php
            }
        ?> 
    </table>
<body>
</html>
<?php $connection->close()?>