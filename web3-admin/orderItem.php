<?php
    session_start();

    $link = mysqli_connect("localhost" , "root" , "") or die("Failed to connect with localhost");
    mysqli_select_db($link , "projet_web3") or die("Failed to connect with DB");

    $getOrderItem = "SELECT * FROM `orderitem`";
    $getOrderItemResult = mysqli_query($link , $getOrderItem) or die("Query failed");

    $totalPrice=0;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="categories.css">
    <link rel="stylesheet" href="orders.css">


    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<div class="container">

<!-- navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand">ADMIN</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <div class="navbar-nav me-auto mb-2 mb-lg-0">
        </div>
        <div class="linkContainer">
            <a href="categories.php">Categories</a>
            <a href="welcomeImage.php">Welcome Image</a>
            <a href="items.php">Items</a>
            <a href="Users.php">Users</a>
            <a href="orders.php">Orders</a>
            <a href="createAdmin.php">Create Admin</a>

        </div>
    </div>
    </div>
</nav>

<!-- items-->
<div class="OrderItemWrapper">
        <div class="myCartTitle">
            <h1>My Cart</h1>
        </div>

        <div class="OrderItemContainer">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ITEM ID</th>
                            <th scope="col">NAME</th>
                            <th scope="col">QUANTITY</th>
                            <th scope="col">PRICE</th>

                        </tr>
                    </thead>
                    <tbody>
                       
                         <?php 
                             while ($OrderItemFetchAssoc = mysqli_fetch_assoc($getOrderItemResult)){
                                    $totalPrice += $OrderItemFetchAssoc['price'] ;
                                ?>

                               <tr>
                                   <th style="width:20%">
                                        <?php echo $OrderItemFetchAssoc['itemid'] ?>
                                   </th>
                                   <td style="width:30%">
                                        <?php 
                                            echo $OrderItemFetchAssoc['name'];
                                        ?>
                                   </td>
                                   <td style="width:20%">
                                        <?php 
                                            echo $OrderItemFetchAssoc['quantity'];
                                        ?>
                                   </td>
                                   <td style="width:20%">
                                        <?php 
                                            echo $OrderItemFetchAssoc['price']."$";
                                        ?>
                                   </td>
                               </tr>    
                        <?php
                             }
                            ?>
                    </tbody>
            </table>
            

        </div>

</div>

<div class="totalPrice">
    <p>
        Total Price:
        <span><?php echo $totalPrice."$" ; ?></span>
    </p>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
<?php 
mysqli_close($link);
?>
</html>