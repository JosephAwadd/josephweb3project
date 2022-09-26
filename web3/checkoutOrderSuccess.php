<?php
    $link = mysqli_connect("localhost" , "root" , "") or die("Failed to connect with localhost");
    mysqli_select_db($link , "projet_web3") or die("Failed to connect with DB");

    $getOrderId = "SELECT `id` FROM `order`";
    $getOrderIdResult = mysqli_query($link , $getOrderId) or die("Query failed");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Success</title>
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
    <link href="checkoutOrderSuccess.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="successWrapper">
        <div class="successContainer">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                </svg>
            </div>
            <div class="thankyouTitleContainer">
                <h2>
                    THANK YOU FOR YOUR PURCHASE
                </h2>
            </div>
            <div class="paymentContainer">
                <p>
                    Payment Method: 
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                        <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                        <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
                    </svg>
                    <b>Cash on Delivery</b>
                </p>
            </div>
            <div class="deliveryContainer">
                <p>Delivery Time: <b>4 to 5 working Days</b></p>
            </div>
            <div class="orerIdContainer">
                <?php while ($OrderFetchAssoc = mysqli_fetch_assoc($getOrderIdResult)){ ?>
                    <p>Your order number is : <b><?php echo $OrderFetchAssoc['id']; ?></b></p>
                <?php } ?>
            </div>
            <div class="checkEmailContainer">
                <p>
                    <b>You will receive an order confirmation email with your order details.</b>
                </p>
                <p>
                    <b>For any problem and questions please contact us via whatsapp or send us an email.</b>
                </p>
            </div>
            <div class="continueShoppingContainer">
                <a href="homepage.php">
                    <div class="continueShoppingButton">
                         <p>Continue Shopping</p>
                    </div>
                </a>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
<?php 
mysqli_close($link);
?>
</html>