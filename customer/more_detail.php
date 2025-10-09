<?php
session_start();
include("../db.php");
$db = new db();
$db->checklogin();
if(isset($_GET['movie_id'])){
    $id = $_GET['movie_id'];
    $db->select("movie","*","movie_id = '$id'");
    $detail = $db->query->fetch_object();
}else{
    header('location:./index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="x-icon" href="./../icon/web.jpg">
    <link rel="stylesheet" href="./../bootstrap/css/bootstrap.min.css">
    <script src="./../bootstrap/js/bootstrap.min.js"></script>
    <script src="./../bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>More Detail</title>
</head>
<style>
    body {
        background-color: #2E3440;
    }
    #screen{
        font-size: xx-large;
        font-weight: bold;
    }
    #product_img {
        height:250px;
        width:250px;
    }
    #back{
        background-color: #E8E8E8;
        font-weight: bold;
        border-radius: 6px;
    }
    #back:hover{
        background-color: #CFCFCF;
        border-radius: 6px;
    }
</style>
<body>
    <?php include("./../setting/navbar_customer.php") ?>
    <div class="container text-center">
        <div class="" style = "height:30px;"></div>
        <div class="row flex-nowrap">
            <div class="col-2 col-md-4 col-lg-3 d-flex flex-column justify-content-between">
                <div class="card">
                    <div class="card-body" style = "height:390px;">
                        <img src="./../movie_img/<?= $detail->pictures ?>" id="product_img" style="" class=" mt-3 rounded card-img-top">
                        <label for="" class="fw-bold fs-3 "><?= $detail->movie_name ?></label> <br>
                        <label for="" class="fw-bold fs-6 text-muted ">Date : <?= $detail->date ?>   </label> <br>
                        <label for="" class="fw-bold fs-6 text-muted ">Duration : <?= $detail->duration ?>  </label>
                    </div>
                </div>
            </div>
            <div class="col-10 col-md-8 col-lg-9 ms-4" >
                <div class="row">
                    <div class="card">
                        <div class="card-body" style = "height:100px;">
                            <p id = "screen">Screen</p>
                        </div>
                    </div>
                </div>
                <div class=""style = "height:20px;"></div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                    <?php
                    ?>
                    
                    <?php  ?>
                </div>
            </div>
        </div>
        <div class=""style = "height:100px;"></div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4"></div>
            <div class="col-4 text-end">
                <a href="./index.php"  class = ""><button id = "back">Back to Homepage</button></a>
            </div>
        </div>
    </div>
</body>
</html>