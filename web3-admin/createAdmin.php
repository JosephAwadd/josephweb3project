<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="createAccount.css">
    <title>Create Account</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
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

        <!-- form -->
        <div id="formWrapper" class="formWrapper">
                <h1>Create Admin</h1>
            <form name="accountForm" action="createAccount.php" method="post">
                <div class="formContainer">
                    <div>
                        <input type="text" id="firstName" name="firstName" placeholder="First Name"/>
                    </div>
                    <div>
                        <input type="text" id="lastName" name="lastName" placeholder="Last Name"/>
                    </div>

                    <div>
                        <input type="email" id="email" name="email" placeholder="Email"/>
                    </div>

                    <div>
                        <input type="password" id="password" name="password" placeholder="Password"/>
                    </div>
                    
                    <div class="submitCreateAdmin">
                        <input type="submit" value="Create Admin" id="subAcc" />
                    </div>
                </div>
            </form>


        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
</body>

</html>
<?php 
mysqli_close($link);
?>