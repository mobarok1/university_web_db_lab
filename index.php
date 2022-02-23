<?
    if(session_status()=== PHP_SESSION_NONE){
        session_start();
    }

    $catId = -1;
    function addToCart($productId){
        $data = null;
        if(isset($_SESSION["cart"])){
            $data =unserialize($_SESSION['cart']);;
        }else{
            $data = [];
        }
        if(!in_array($productId,$data)){
            array_push($data,$productId);
            $_SESSION['cart'] = serialize($data);
            echo "Added in cart";
        }else{
            echo "Already in cart";
        }
       
    }

    if($_SERVER["REQUEST_METHOD"]=="GET"){
        if(isset($_GET["cart"])){
            addToCart($_GET["cart"]);

        }else if(isset($_GET["category"])){
            $catId = $_GET["category"];
            
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
        <h3>Home - All Products</h3>
        <?php
            $sql = "";
            if($catId==-1){
                $sql = "SELECT * from products";
            }else{
                $sql = "SELECT * from products where category_id=".$catId;
            }
        
            $result = $connection->query($sql);
            while($row = $result->fetch_assoc()){
            ?>
            <div>
                <?php echo $row["product_name"]."  <a href=?cart=".$row["id"].">Add to cart</a>"; ?>  
            </div>

        <?php
            }
        ?> 

    <body>
</html>