<?php

$link = mysqli_connect("localhost" , "root" , "") or die("Failed to connect with localhost");
mysqli_select_db($link , "projet_web3") or die("Failed to connect with DB");

$getOrders = "SELECT * FROM `order`";
$getOrdersResult = mysqli_query($link , $getOrders) or die("Query failed");



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
                        <a href="charts.php">Charts</a>
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

    <div class="orderTitle">
        <h1>Orders</h1>
    </div>

    <!-- Orders-->
    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">USER ID</th>
                            <th scope="col">ADRESS</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">NAME</th>
                            <th scope="col">VIEW ORDER</th>
                            <th scope="col">STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                         <?php 
                             while ($OrderFetchAssoc = mysqli_fetch_assoc($getOrdersResult)){
                                ?>

                               <tr>
                                   <th>
                                        <a>
                                            <?php 
                                                echo $OrderFetchAssoc['id'];
                                            ?>
                                        </a>
                                   </th>
                                   <td>
                                        <?php 
                                            echo $OrderFetchAssoc['userid'];
                                        ?>                               
                                    </td>
                                    <td>
                                        <?php 
                                            echo $OrderFetchAssoc['adress'];
                                        ?>                               
                                    </td>
                                    <td>
                                        <?php 
                                            echo $OrderFetchAssoc['email'];
                                        ?>                               
                                    </td>
                                    <td>
                                        <?php 
                                            echo $OrderFetchAssoc['name'];
                                        ?>                               
                                    </td>
                                    <td>
                                       <a href="orderItem.php">
                                            <div class="viewOrder">
                                                view order
                                            </div>
                                       </a>                            
                                    </td>
                                    <td>
                                        <?php if($OrderFetchAssoc['status'] === '0'){
                                            $url="checkStatus.php?id=".$OrderFetchAssoc['userid'];    
                                        ?>
                                            <a href="<?php echo $url; ?>">
                                                <span class="badge text-bg-warning">Pending</span>                                            
                                            </a>
                                        <?php }else{ ?> 
                                            <span class="badge text-bg-success">Complete</span>                                            
                                        <?php } ?>
                                    </td>
                                   
                               </tr>
                        <?php
                             }
                            ?>

                           
                    </tbody>
    </table>

</div>
    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
<?php 
mysqli_close($link);
?>
</html>