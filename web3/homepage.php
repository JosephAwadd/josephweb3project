<?php
session_start();

$link = mysqli_connect("localhost" , "root" , "") or die("Failed to connect with localhost");
mysqli_select_db($link , "projet_web3") or die("Failed to connect with DB");

$getCategories = "SELECT * FROM categories";
$getCategoriesResult = mysqli_query($link , $getCategories) or die("Query failed 1");
$getCategoriesFooterResult = mysqli_query($link , $getCategories) or die("Query failed 1");

$getWelcomeImage = "SELECT * FROM welcomeimage";
$getWelcomeImageResult = mysqli_query($link , $getWelcomeImage) or die("Query failed 2");

$getItems = "SELECT * FROM `items` WHERE `items`.`discountprice` = 0";
$getItemsResult = mysqli_query($link , $getItems) or die("Query failed 3");

$getDiscountedItems="SELECT * FROM `items` WHERE `items`.`discountprice` != 0";
$getDiscountedItemsResult=mysqli_query($link , $getDiscountedItems) or die("Query failed 4");


function subString($string , $lenght){
    if(strlen($string) > $lenght){
        $string = substr($string, 0, $lenght) . '...';
    }
    echo $string;
}


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
    <link href="homepage.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <script type='text/javascript'>
        function logout() {
            $.ajax({
            type: "POST",
            url: "destroySession.php",
            data: "userId=userId",
            success: function(){
                window.location.reload();
            }
            });
        }
    </script>

</head>

<body class="body">

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
    <!-- categories -->
<div class="container">
    <div class="categoriesContainer">
        <?php 
            
            while ($CatFetchAssoc = mysqli_fetch_assoc($getCategoriesResult)){
                $name = "itemsByCategorie.php?name=".$CatFetchAssoc['name'] ;
        ?>
                <a href="<?php echo $name; ?>">
                    <span class="categories badge rounded-pill" style="background-color:#165a6d;">
                    <?php
                            echo $CatFetchAssoc['name'];
                 echo "</span> </a>";
                 
         }       
        ?>     
      </div>
</div>

    <!-- carousel -->
<div class="container">
    <div class="imageContainer">
        <?php 
            while ($WelImgFetchAssoc = mysqli_fetch_assoc($getWelcomeImageResult)){
        ?>
            <img src="./welcomeimage/<?php echo $WelImgFetchAssoc['url']; ?>" style="width:80%"/> 
                                      
        <?php } ?>   
    </div> 
</div>

    <!-- Discounted Items -->
<div>  
    <div class="container">
             <div class="discountItemTitle">
                <h1>Discount Items</h1>
            </div>   
            <div class="DiscountItemContainer">
            <?php 
                while ($DiscountedItemFetchAssoc = mysqli_fetch_assoc($getDiscountedItemsResult)){
                    $id = "itemDetail.php?id=".$DiscountedItemFetchAssoc['id'] ;
                    $savedPrice=$DiscountedItemFetchAssoc['price']-$DiscountedItemFetchAssoc['discountprice'];
            ?>
            
                <div class="itemContainer col-3">
                    
                    <div style="position:relative;">
                        <img src="./itemImages/<?php echo $DiscountedItemFetchAssoc['image'] ?>" style="width:100%; height:25vh;"/>
                        <div class="discountPercentContainer">
                            <p><b>save&nbsp;<?php echo $savedPrice; ?>$</b></p>
                        </div>
                    </div>
                    <div class="itemNameCotntainer">
                        <p>
                            <?php
                            $itemName = $DiscountedItemFetchAssoc['name'];
                            subString($itemName , 45);
                        ?>
                        </p>
                    </div>
                    <div class="itemDescriptionCotntainer">
                        <p>
                            <?php
                            $itemName = $DiscountedItemFetchAssoc['description'];
                            subString($itemName , 30);
                        ?>
                        </p>
                    </div>
                    <div class="itemCatPriceContainer">
                        <div>
                            <p><?php echo $DiscountedItemFetchAssoc['catname']; ?></p>
                        </div>
                        <?php if($DiscountedItemFetchAssoc['discountprice'] === '0'){ ?>
                            <div>
                                <p class="itemPrice"><?php echo $DiscountedItemFetchAssoc['price']; ?>$</p>
                            </div>
                        <?php }else{ ?>
                            <div class="discountPriceContainer">
                                <p class="discountItemPrice"><?php echo $DiscountedItemFetchAssoc['discountprice']; ?>$</p>
                                <p class="oldItemPrice"><?php echo $DiscountedItemFetchAssoc['price']; ?>$</p>
                            </div>
                        <?php } ?>
                    </div>
                    <a href="<?php echo $id; ?>">
                        <div class="BuyItemContainer">
                            View Item
                        </div>
                    </a>

                </div>
               
       
    <?php } ?>  
    </div>
    </div>
</div>  

    <!--Items -->
<div class="container">
        <div class="featureItemTitle">
            <h1>Items</h1>
        </div>
        <div class="featureItemContainer">
            <?php 
                while ($ItemFetchAssoc = mysqli_fetch_assoc($getItemsResult)){
                    $id = "itemDetail.php?id=".$ItemFetchAssoc['id'] ;
            ?>
                <div class="itemContainer col-3">
                    <div>
                        <img src="./itemImages/<?php echo $ItemFetchAssoc['image'] ?>" style="width:100%; height:25vh;"/>
                    </div>
                    <div class="itemNameCotntainer">
                        <p>
                            <?php
                            $itemName = $ItemFetchAssoc['name'];
                            subString($itemName , 45);
                        ?>
                        </p>
                    </div>
                    <div class="itemDescriptionCotntainer">
                        <p>
                            <?php
                            $itemName = $ItemFetchAssoc['description'];
                            subString($itemName , 30);
                        ?>
                        </p>
                    </div>
                    <div class="itemCatPriceContainer">
                        <div>
                            <p><?php echo $ItemFetchAssoc['catname']; ?></p>
                        </div>
                        <?php if($ItemFetchAssoc['discountprice'] === '0'){ ?>
                            <div>
                                <p class="itemPrice"><?php echo $ItemFetchAssoc['price']; ?>$</p>
                            </div>
                        <?php }else{ ?>
                            <div class="discountPriceContainer">
                                <p class="discountItemPrice"><?php echo $ItemFetchAssoc['discountprice']; ?>$</p>
                                <p class="oldItemPrice"><?php echo $ItemFetchAssoc['price']; ?>$</p>
                            </div>
                        <?php } ?>
                    </div>
                    <a href="<?php echo $id; ?>">
                        <div class="BuyItemContainer">
                            View Item
                        </div>
                    </a>

                </div>
            <?php } ?>   
        </div>

</div>

    <!--footer-->
<div class="footerWrapper">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="logoContainer">
                    <img src="./logo/techspace.png" style="width:250px;"/>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top:32px;">

            <div class="col">
                <div class="firstColContainer">
                    <div>
                        <h3>OPENING HOURS</h3>
                    </div>
                    <div>
                        <ul>
                            <li>Monday........10:00-6:00</li>
                            <li>Tuesday........10:00-6:00</li>
                            <li>Wendnesday........10:00-6:00</li>
                            <li>Thursday........10:00-6:00</li>
                            <li>Friday........10:00-6:00</li>
                            <li>Saturday........10:00-2:00</li>
                            <li>Sunday........Closed</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="secondColContainer">
                    <div>
                        <div>
                            <h3>LOCATION</h3>
                        </div>
                        <div style="display:flex;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt socialMediaIcon" viewBox="0 0 16 16">
                                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                            <p>                          
                                &nbsp;SpaceTech - Zalka High Way<br></br> Facing white Tower hotel Ground <br></br>Floor, Zalka, Lebanon.
                            </p>
                        </div>
                    </div>
                    <div class="socialMediaContainer">
                        <div>
                            <h3>SOCIAL MEDIA</h3>
                        </div>
                        <div class="socialMediaIconsContainer">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-facebook socialMediaIcon" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                </svg>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-twitter socialMediaIcon" viewBox="0 0 16 16">
                                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                                </svg>
                            </div>
                            <div> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-pinterest socialMediaIcon" viewBox="0 0 16 16">
                                    <path d="M8 0a8 8 0 0 0-2.915 15.452c-.07-.633-.134-1.606.027-2.297.146-.625.938-3.977.938-3.977s-.239-.479-.239-1.187c0-1.113.645-1.943 1.448-1.943.682 0 1.012.512 1.012 1.127 0 .686-.437 1.712-.663 2.663-.188.796.4 1.446 1.185 1.446 1.422 0 2.515-1.5 2.515-3.664 0-1.915-1.377-3.254-3.342-3.254-2.276 0-3.612 1.707-3.612 3.471 0 .688.265 1.425.595 1.826a.24.24 0 0 1 .056.23c-.061.252-.196.796-.222.907-.035.146-.116.177-.268.107-1-.465-1.624-1.926-1.624-3.1 0-2.523 1.834-4.84 5.286-4.84 2.775 0 4.932 1.977 4.932 4.62 0 2.757-1.739 4.976-4.151 4.976-.811 0-1.573-.421-1.834-.919l-.498 1.902c-.181.695-.669 1.566-.995 2.097A8 8 0 1 0 8 0z"/>
                                </svg>
                            </div>
                            <div> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-instagram socialMediaIcon" viewBox="0 0 16 16">
                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                                </svg>
                            </div>
                            <div> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-youtube socialMediaIcon" viewBox="0 0 16 16">
                                    <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="thirdColContainer">
                    <div>
                        <h3>CATEGORIES</h3>
                    </div>
                    <div>
                        <ul>
                            <?php 
                                while ($CatFetchAssoc = mysqli_fetch_assoc($getCategoriesFooterResult)){
                                    $name = "itemsByCategorie.php?name=".$CatFetchAssoc['name'] ;
                            ?>
                            <li>
                                <a href="<?php echo $name ?>"><?php echo $CatFetchAssoc['name'] ?></a>
                            </li>
                            <?php } ?>
                        </ul>    
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="fourthColContainer">
                    <div>
                        <h3>CONTACT US</h3>
                    </div>
                    <div class="phoneEmailContainer">
                        <div style="display:flex;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-telephone-fill contactIcon" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                            </svg>
                            <p>+961 *** ***</p>
                        </div>
                        <div style="display:flex; margin-top:16px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-envelope-fill contactIcon" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                            </svg>
                            <p>spacetech@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="row">
            <div class="col">
                <div class="copyRight">
                  <p>Copyright ©-2022 All Right Reserved</p>  
                </div>                
            </div>
        </div>

    </div>
</div>
   



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
<?php 
mysqli_close($link);
?>
</html>

 <!-- <a href="#" class="float hide" id="floatingbutton">
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-caret-up my-float" viewBox="0 0 16 16">
            <path d="M3.204 11h9.592L8 5.519 3.204 11zm-.753-.659 4.796-5.48a1 1 0 0 1 1.506 0l4.796 5.48c.566.647.106 1.659-.753 1.659H3.204a1 1 0 0 1-.753-1.659z"/>
        </svg>
    </a> -->