<?php

$link = mysqli_connect("localhost" , "root" , "") or die("Failed to connect with localhost");
mysqli_select_db($link , "projet_web3") or die("Failed to connect with DB");

$getUsers = "SELECT * FROM users";
$getUsersResult = mysqli_query($link , $getUsers) or die("Query failed");



?>

<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="Users.css">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
             <!-- navbar -->
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand">ADMIN</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
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

            <!-- create new categorie -->
            <div class="row">
                <div class="col">
                    <div class="userTitle">
                        <h1>Users</h1>
                    </div>
                </div>
                
            </div>
            

             <!-- categories list -->
             <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">FIRST NAME</th>
                            <th scope="col">LAST NAME</th>
                            <th scope="col">USERNAME</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">ADRESS</th>

                        </tr>
                    </thead>
                    <tbody>
                       
                         <?php 
                             while ($UserFetchAssoc = mysqli_fetch_assoc($getUsersResult)){
                                ?>

                               <tr>
                                   <th>
                                        <?php 
                                            echo $UserFetchAssoc['id'];
                                        ?>
                                   </th>
                                   <td>
                                        <?php 
                                            echo $UserFetchAssoc['firstname'];
                                        ?>                               
                                    </td>
                                    <td>
                                        <?php 
                                            echo $UserFetchAssoc['lastname'];
                                        ?>                               
                                    </td>
                                    <td>
                                        <?php 
                                            echo $UserFetchAssoc['username'];
                                        ?>                               
                                    </td>
                                    <td>
                                        <?php 
                                            echo $UserFetchAssoc['email'];
                                        ?>                               
                                    </td>
                                    <td>
                                        <?php 
                                            echo $UserFetchAssoc['adress'];
                                        ?>                               
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
</html>