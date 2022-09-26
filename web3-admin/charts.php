<?php
    $link = mysqli_connect("localhost" , "root" , "") or die("Failed to connect with localhost");
    mysqli_select_db($link , "projet_web3") or die("Failed to connect with DB");
?>

<html>
<head>
 <meta charset="utf-8">
 <title>
    Charts 
 </title>
 <link rel="stylesheet" href="categories.css">
 <link rel="stylesheet" href="charts.css">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
 <!-- js of google of chart --> 
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>

 <!--pie chart-->
 <script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {

    var data_val = google.visualization.arrayToDataTable([
        ['catname', 'quantity'],
        <?php 
        $getCategories = "SELECT * FROM categories";
        $getCategoriesResult = mysqli_query($link , $getCategories) or die("Query failed");

        while ($CatFetchAssoc = mysqli_fetch_assoc($getCategoriesResult)){
            $catName=$CatFetchAssoc['name'];

            $getCountCat="SELECT count(*) as count , itemcat FROM `orderitemarchive` WHERE `orderitemarchive`.`itemcat` ='$catName'";
            $getCountCatResult=mysqli_query($link , $getCountCat) or die("Query failed 1");

            while ($CountCatFetchAssoc = mysqli_fetch_assoc($getCountCatResult)){
                $catname= $CountCatFetchAssoc['itemcat'];
                $count= $CountCatFetchAssoc['count'];

                echo "['".$catname."',".$count."],";
            }   
        }
    ?>
    ]);

    var options_val = {
    title: 'Total of items ordered for each categorie'
    };

    var chart_val = new google.visualization.PieChart(document.getElementById('piechart'));

    chart_val.draw(data_val, options_val);
    }
 </script>

 <!--line chart-->
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
    var data_val = google.visualization.arrayToDataTable([
    ['Categories', 'Number of items'],
    <?php 
        $getCategories = "SELECT * FROM categories";
        $getCategoriesResult = mysqli_query($link , $getCategories) or die("Query failed");

        while ($CatFetchAssoc = mysqli_fetch_assoc($getCategoriesResult)){
            $catName=$CatFetchAssoc['name'];

            $getCountCat="SELECT count(*) as count , catname FROM `items` WHERE `items`.`catname` ='$catName'";
            $getCountCatResult=mysqli_query($link , $getCountCat) or die("Query failed 1");

            while ($CountCatFetchAssoc = mysqli_fetch_assoc($getCountCatResult)){
                $catname= $CountCatFetchAssoc['catname'];
                $count= $CountCatFetchAssoc['count'];

                echo "['".$catname."',".$count.",],";
            }   
        }
    ?>
    
    ]);

    var options_val = {
    title: 'Number of items for each categorie'
    };
    var chart_val = new google.visualization.ColumnChart(document.getElementById("columnchart"));
    chart_val.draw(data_val, options_val);
    }
 </script>

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


    <h1 style="margin-top:64px;">Charts</h1>
    <!--Charts-->
        <div>
            <div id="piechart" style="width: 100%; height: 600px;"></div>
        </div>
        <div>
            <div id="columnchart" style="width: 100%; height: 600px;"></div>
        </div>
</div>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>
<?php 
mysqli_close($link);
?>