<?php include_once "config/db.php"?>
<?php
if(session_status()===PHP_SESSION_NONE){
    session_start();
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["Add"])){
        $name=$_POST["name"];
        $price=$_POST["price"];  
        $category=$_POST["category"];
        $sql = "INSERT into `products` (`product_name`,`price`,`category_id`) VALUES('$name',$price,$category)";
            if($connection->query($sql) == true){
            echo "Successfully Product Added";
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
    <h3>Add New Product</h3>
    <form action="" method="POST">

        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="price">Price:</label>
        <input type="decimal" name="price">

        <label for="category">Category:</label>
        <select name="category" id="category">
        <?php 
            $sql = "SELECT * from category";
            $result = $connection->query($sql);
          //  $row = fetch_assoc($result);
          //  $row = $result->fetch_assoc()
            while($row = $result->fetch_assoc()){
            ?>
               <option value='<?php echo $row['id'];?>'><?php echo $row['name'];?></option>
            <?php } ?>
        </select>

        <input type="submit" name="Add" id="submit">
    </form>
    <h3>All Product</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
        </tr>
    <?php
            $sql = "SELECT `id`,`product_name`,`price`,(SELECT `name` from `category` ct where ct.id=p.id) as `catName` from products p";
            $result = $connection->query($sql);
            while($row = $result->fetch_assoc()){
            ?>
             <tr>
                <th><?php echo $row["id"]?></th>
                <th><?php echo $row["product_name"]?></th>
                <th><?php echo $row["price"]?></th>
                <th><?php echo $row["catName"]?></th>
            </tr>
        
        <?php
            }
        ?> 
    </table>
<body>
</html>
<?php $connection->close()?>