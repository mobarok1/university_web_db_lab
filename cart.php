<?
    if(session_status()=== PHP_SESSION_NONE){
        session_start();
    }
    

    if($_SERVER["REQUEST_METHOD"]=="GET"){
        if(isset($_GET["remove"])){
            $cartData = [];
            $productId = $_GET["remove"];
            if(isset($_SESSION["cart"])){
                $cartData =unserialize($_SESSION['cart']);;
            }
            $needToRemove = array($productId);
            $cartData = array_diff($cartData, $needToRemove);;
            $_SESSION['cart'] = serialize($cartData);

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
        <h3>Cart - Cart Item</h3>
    
        <table>
        <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php
                 $cartData = [];
                 if(isset($_SESSION["cart"])){
                     $cartData =unserialize($_SESSION['cart']);;
                 }
                $subTotal = 0;
                $sql = "SELECT * from products where id in (" . implode(',', array_map('intval', $cartData)) . ")";
                $result = $connection->query($sql);
                if($result){
                    while($row = $result->fetch_assoc()){
                        $subTotal+=$row["price"];
                    ?>
                    <tr>
                        <th><?php echo $row["id"]?></th>
                        <th><?php echo $row["product_name"]?></th>
                        <th><?php echo $row["price"]?></th>
                        <th><?php echo "<a href=?remove=".$row["id"].">Remove</a>"?></th>
                    </tr>
                    <?php
                        }
                    }
                    ?> 
                <tr>
                    <th colspan="2">Total</th>
                    <th><?php echo $subTotal;?></th>
                    <th></th>
                 </tr>
        </table>
    <body>
</html>