<?php
    $link = mysqli_connect("localhost" , "root" , "") or die("Failed to connect with localhost");
    mysqli_select_db($link , "projet_web3") or die("Failed to connect with DB");

    $getCategories = "SELECT name FROM categories";
    $getCategoriesResult = mysqli_query($link , $getCategories) or die("Query failed");

    $getItems = "SELECT * FROM items";
    $getItemsResult = mysqli_query($link , $getItems) or die("Query failed");


?>

<html>
    <head> 
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="items.css">
        <title>Items</title>

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">


        <script>
            function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                      tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }
            }
            }
        </script>

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

            <!-- create new item -->
            <div class="itemWrapper">
                    <div class="itemTitle">
                        <h1>Create new item</h1>
                    </div>
                    <div class="itemContainer">
                        <form name="editCat" action="createItem.php" method="post" enctype="multipart/form-data">
                            <div class="formContainer">
                                <div class="categorieContainer">
                               
                                    <select name="categorie" id="categorie">
                                        <?php 
                                             while ($CatFetchAssoc = mysqli_fetch_assoc($getCategoriesResult)){
                                        ?>
                                             <option name="categorie" id="categorie" value="<?php echo $CatFetchAssoc['name'] ?>"><?php echo $CatFetchAssoc['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <!-- <input name="categorie" type="text" id="categorie" placeholder="Categorie Name" /> -->
                                </div>
                                <div class="nameContainer">
                                    <input name="name" type="text" id="name" placeholder="Item Name" />
                                </div>
                                <div class="descriptionContainer">
                                    <input name="description" type="text" id="description" placeholder="Item Description" />
                                </div>
                                <div class="priceContainer">
                                    <input name="price" type="number" id="price" placeholder="Item Price" />
                                </div>
                                <div class="priceContainer">
                                    <input name="discountprice" type="number" id="discountprice" placeholder="Discount Price" value="0"/>
                                </div>
                                <div class="stockContainer">
                                    <input name="stock" type="number" id="stock" placeholder="Stock" />
                                </div>
                                <div class="selectImageContainer">
                                    <input type="file" name="photo[]" multiple>
                                </div>
                                <div class="submitContainer">
                                    <input type="submit" name="submit" value="Create Item" id="createItem"/>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>

            <!-- items-->
            <div>
                <div style="margin-top:64px;">
                    <h1>Items</h1>
                </div>
                    <div class="searchBar">
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search By Categorie...">
                    </div>

                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>CATEGORIE NAME</th>
                                <th>NAME</th>
                                <th>DESCRIPTION</th>
                                <th>PRICE ($)</th>
                                <th>STOCK</th>
                                <th>IMAGE</th>
                                <th>DATE</th>
                                <th>DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <?php 
                                while ($ItemFetchAssoc = mysqli_fetch_assoc($getItemsResult)){
                                    ?>

                                <tr>
                                    <th style="width:5%">
                                            <?php 
                                                echo $ItemFetchAssoc['id'];
                                            ?>
                                    </th>

                                    <td style="width:10%">
                                            <?php 
                                                echo $ItemFetchAssoc['catname'];
                                            ?>                               
                                    </td>

                                    <td style="width:10%">
                                            <?php 
                                                echo $ItemFetchAssoc['name'];
                                            ?>                               
                                    </td>

                                    <td style="width:15%">
                                            <?php 
                                                echo $ItemFetchAssoc['description'];
                                            ?>                               
                                    </td>

                                    <td style="width:10%"> 
                                        <div style="margin-bottom:32px;">
                                            <?php $id = "editItem.php?id=".$ItemFetchAssoc['id']; ?>
                                            <p style="margin:0;font-weight:600;">price</p>
                                            <form name="editCat" action="<?php echo $id; ?>" method="post">
                                                <div style="display:flex;">
                                                    <input type="number" min="0" value="<?php echo $ItemFetchAssoc['price']; ?>" name="price" style="width:100px;"/>
                                                    <input 
                                                        type="submit"
                                                        value="Edit" 
                                                        id="submiteditItem" 
                                                        style="margin-left:16px;" 
                                                    />
                                                </div>
                                            </form>
                                        </div>                                          
                                       
                                        <div>
                                            <?php $url = "editDiscountItem.php?id=".$ItemFetchAssoc['id']; ?>
                                            <p style="margin:0;font-weight:600;">discount price</p>
                                            <form name="editdiscPrice" action="<?php echo $url; ?>" method="post">
                                                <div style="display:flex;">
                                                    <input type="number" min="0" max="<?php echo $ItemFetchAssoc['price']; ?>" value="<?php echo $ItemFetchAssoc['discountprice']; ?>" name="discountprice" style="width:100px;"/>
                                                    <input 
                                                        name="submit"
                                                        type="submit"
                                                        value="Edit" 
                                                        id="submit" 
                                                        style="margin-left:16px;" 
                                                    />
                                                </div>
                                            </form>
                                        </div>
                                        
                                    </td>

                                    <td style="width:10%">                                           
                                        <?php $id = "editStock.php?id=".$ItemFetchAssoc['id']; ?>
                                        <form name="editStock" action="<?php echo $id ?>" method="post">
                                            <div style="display:flex;">
                                                <input type="number" value="<?php echo $ItemFetchAssoc['stock']; ?>" name="stock" style="width:100px;"/>
                                                <input 
                                                    type="submit"
                                                    value="Edit" 
                                                    id="submiteditStock" 
                                                    style="margin-left:16px;" 
                                                 />
                                            </div>
                                        </form>
                                    </td>

                                    <td style="width:10%">
                                        <img src="../web3/itemImages/<?php echo $ItemFetchAssoc['image']; ?>" style="width:100%;"/>                              
                                    </td>

                                    <td style="width:10%">
                                            <?php 
                                                echo $ItemFetchAssoc['date'];
                                            ?>                               
                                    </td>

                                    <td style="width:10%;">
                                        <?php $delete = "deleteItem.php?delete=".$ItemFetchAssoc['id']; ?>
                                        <form name="deleteCat" action="<?php echo $delete ?>" method="post">
                                            <input 
                                                 style="padding:6px 12px 6px 12px;"
                                                 type="submit"
                                                 name="submit"
                                                 value="Delete" 
                                                 id="submitdelItem" 
                                            />    
                                        </form>                          
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                        </tbody>
                </table>
            </div>
            
        </div>
    </body>

</html>