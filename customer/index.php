<?php
session_start();
include("../db.php");
$db = new db();
$db->checklogin();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="./../icon/web.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../bootstrap/css/bootstrap.min.css">
    <script src="./../bootstrap/js/bootstrap.min.js"></script>
    <script src="./../bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>Main</title>
</head>
<style>
    body {
        background-color: #2E3440;
    }

    #movie-text {
        margin-top: 90px;
        align-items: start;
        background-color: red;
        color: white;
        font-weight: bold;
        border-radius: 5px;
    }

    #buadd {
        border-radius: 5px;
        background-color: #49D640;
        color: white;
        font-weight: bold;
    }

    #buadd:hover {
        background-color: #68A667;
        color: white;
    }

    #bremove {
        border-radius: 5px;
        background-color: #D62F2F;
        color: white;
        font-weight: bold;
    }

    #bremove:hover {
        border-radius: 5px;
        background-color: #521919;
        color: white;
        font-weight: bold;
    }

    #detail {
        text-align: center;
        align-items: center;
        background-color: #6B6B6B;
        font-weight: bold;
        color: white;
        border-radius: 10px;
        padding: 5px;
    }

    #detail:hover {
        text-align: center;
        align-items: center;
        background-color: #191919;
        font-weight: bold;
        color: white;
        border-radius: 10px;
        padding: 5px;
    }

    #product_img {
        transition: transform 0.6s ease;
        height: 250px;
        width: 240px;
    }

    #product_img:hover {
        transform: scale(1.03);
    }

    #card {
        background-color: #CFC4C4;
        transition: transform 0.6s ease;
    }

    #card:hover {
        transform: scale(1.03);
    }

    #search {
        margin-top: 90px;
        font-weight: bold;
    }

    #search_b {
        font-weight: bold;
        background-color: #49D640;
        color: white;
    }

    #search_b:hover {
        background-color: #68A667;
        color: white;
    }
</style>

<body>
    <?php include('./../setting/navbar_customer.php') ?>
    <div class="container text-center">
        <div class="row">
            <?php $db->loadalert(); ?>
            <div class="col-4 text-start">
                <button disabled="disabled" id="movie-text">Movie</button>
            </div>
            <div class="col-5"></div>
            <div class="col-3 text-end" id="search">
                <form action="" method="post">
                    <div class="input-group">
                        <input type="date" class="form-control" name="date">
                        <input type="submit" value="Search" name="search" class="btn btn" id="search_b">
                    </div>
                </form>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
            <?php
            if(isset($_POST['search'])){
                $date = $_POST['date'];
                $db->select("movie","*","date = '$date'");
                if($date == null){
                    $db->select("movie", "*");
                }
            }else{
                $db->select("movie", "*");
            }
            if($db->query->num_rows > 0){
            while ($fetch = $db->query->fetch_object()) {
            ?>
                <div class="card col-2 col-md-4 col-lg-3 m-3" id="card" style="width: 18rem;">
                    <img src="./../movie_img/<?= $fetch->pictures ?>" id="product_img" style=" object-fit:cover;" class=" mt-3 rounded img-fluid ">
                    <div class="card-body">
                        <label for="" class="fw-bold fs-2"><?= $fetch->movie_name ?></label><br>
                        <label for="" class="fw-bold fs-6 text-muted ">Date <?= $fetch->date ?></label>
                        <hr>
                        <a href="./more_detail.php?movie_id=<?= $fetch->movie_id ?>"><button id="detail">More Detail</button></a>
                    </div>
                </div>
            <?php } }else{ ?>
                <div class="col-4"></div>
                <div class="col-4 text-center mt-5">
                    <p class = "fw-bold fs-2" style = "color:white;">Movie not found.</p>
                </div>
                <div class="col-4"></div>
            <?php } ?>
        </div>
    </div>
</body>

</html>