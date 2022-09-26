<?php
session_start();

$userId=$_SESSION['userId'];

$link = mysqli_connect("localhost" , "root" , "") or die("Failed to connect with localhost");
mysqli_select_db($link , "projet_web3") or die("Failed to connect with DB");

$getFavoriteItems= "SELECT * FROM `favorite` WHERE `favorite`.`userid`='$userId'";
$getFavoriteItemsResult = mysqli_query($link , $getFavoriteItems) or die("Query failed");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorite Items</title>
      <!-- CSS only -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
    <link href="homepage.css" rel="stylesheet" type="text/css" />
    <link href="favoriteItems.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</head>
<body>

      <!-- navbar -->
<div style="background-color:#2698b8;padding:8px;">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
                <a class="navbar-brand" href="homepage.php" class="logo"><img src="./logo/techspace.png" style="width:150px;"/></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <div class="navbar-nav me-auto mb-2 mb-lg-0">
                    </div>
                    
                    <?php if(!isset($_SESSION["userId"])){?>
                        <div class="buttonsContainer">
                            <a href="signin.php">
                            <button type="button" class="btn btn-outline" style="color:white;">Sign in</button>
                            </a>
                            <a href="signup.php">
                                <button type="button" class="btn" style="background-color:white;">Sign up</button>
                            </a>
                        </div>
                    <?php }else{?>
                        <div class="loggedinPgesContainer">

                        <div class="favoriteContainer">
                            <a href="favoriteItems.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16" style="color:white;">
                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                </svg>
                            </a>
                        </div>

                            <div class="profileContainer">
                                <?php $id = "myProfile.php?id=".$_SESSION['userId']; ?>
                                <a href="<?php echo $id; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16" style="color:white;">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                    </svg>
                                </a>
                               
                            </div>

                            <div class="cartContainer">
                                <?php $cart = "myCart.php"; ?>
                                <a href="<?php echo $cart; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16" style="color:white;">
                                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                    </svg>
                                </a>
                               
                           </div>
                           <div class="logOutContainer" onclick="logout();">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16" style="color:white;">
                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                </svg> 
                           </div>

                        </div>

                    <?php }?>

                </div>
            </div>
        </nav>
    </div>
</div>

<!-- Items -->
<div class="container">
    <div class="favoriteItemsWrapper">
        <div class="myCartTitle">
            <h1>Favorite Items</h1>
        </div>

        <div style="margin-top:32px;">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">IMAGE</th>
                            <th scope="col">CATEGORIE</th>
                            <th scope="col">NAME</th>
                            <th scope="col">DESCRIPTION</th>
                            <th scope="col">ACTIONS</th>

                        </tr>
                    </thead>
                    <tbody>
                       
                         <?php 
                             while ($FavoriteItemFetchAssoc = mysqli_fetch_assoc($getFavoriteItemsResult)){
                                        $url = "itemDetail.php?id=".$FavoriteItemFetchAssoc['itemid'] ;
                                ?>

                               <tr style="width:5%">
                                   <th>
                                        <?php 
                                            echo $FavoriteItemFetchAssoc['itemid'];
                                        ?>
                                   </th>
                                   <td style="width:20%">
                                        <img src="./itemImages/<?php echo $FavoriteItemFetchAssoc['image']; ?>" style="width:100%"/>
                                   </td>
                                   <td style="width:5%">
                                        <?php 
                                            echo $FavoriteItemFetchAssoc['catname'];
                                        ?>
                                   </td>
                                   <td style="width:20%">
                                        <?php 
                                            echo $FavoriteItemFetchAssoc['name'];
                                        ?>
                                   </td>
                                   <td style="width:25%">
                                        <?php 
                                            echo $FavoriteItemFetchAssoc['description'];
                                        ?>
                                   </td>
                                   <td style="width:5%">
                                      <div class="deleteContainer" id="deleteContainer">
                                        DELETE
                                      </div>
                                      <a href="<?php echo $url; ?>">
                                        <div class="viewItemContainer">
                                            VIEW
                                        </div>
                                      </a>
                                      
                                   </td>
                               </tr>    
                        <?php
                             }
                            ?>
                    </tbody>
            </table>
            

        </div>

    </div>
</div>


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
<script type='text/javascript'>
       $('#deleteContainer').click(function(){
            $.ajax({
                url: "deletefavorite.php",
                success: function(){
                    window.location.reload();
                }
                });
       });
                
</script>
</html>