<?php
session_start();
include("../db.php");
$db = new db();
if($_SESSION['typeuser'] != 'admin'){
    header('location:./../system/logout.php');
}
if(isset($_POST['add'])){
    $title = $_POST['title'];
    $hr = $_POST['hr'];
    $mins = $_POST['mins'];
    $date = $_POST['date'];
    $file = $_FILES['img'];
    if ($file['name'] != '') {
        $img = $db->uploadimg($file);
    } else {
        $img = "default.jpg";
    }
    $add = $db->select("movie","*","movie_name = '$title'");
    if($db->query->num_rows > 0){
        $db->setalert("warning","Already have this movie.");
    }else{
        $time = "$hr hr $mins mins";
        $list =[
            'movie_name' => $title,
            'duration' => $time,
            'date' => $date,
            'pictures' => $img
        ];
        $db->insert("movie",$list);
        if ($db->query) {
            $db->setalert("success", "Add movie Successfully!");
            return;
        } else {
            $db->setalert("error", "Something Error on code!");
            return;
        }
    }
}
if(isset($_POST['remove'])){
    $movie_id = $_POST['movie_id'];
    $db->delete("movie","movie_id = '$movie_id'");
    if ($db->query) {
        $db->setalert("error", "Remove movie Successfully!");
        return;
    } else {
        $db->setalert("error", "Error on code!");
        return;
    }
}
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
    #buadd{
        border-radius: 5px;
        background-color: #49D640;
        color:white;
        font-weight: bold;
    }
    #buadd:hover{
        background-color: #68A667;
        color:white;
    }
    #bremove{
        border-radius: 5px;
        background-color: #D62F2F;
        color:white;
        font-weight: bold;
    }
    #bremove:hover{
        border-radius: 5px;
        background-color: #521919;
        color:white;
        font-weight: bold;
    }
    #detail{
        text-align: center;
        align-items: center;
        background-color:#6B6B6B;
        font-weight: bold;
        color:white;
        border-radius: 10px;
        padding: 5px;
    }
    #detail:hover{
        text-align: center;
        align-items: center;
        background-color:#191919;
        font-weight: bold;
        color:white;
        border-radius: 10px;
        padding: 5px;
    }
    #product_img {
        transition: transform 0.6s ease;
        height:250px;
        width:240px;
    }

    #product_img:hover {
        transform: scale(1.03);
    }
    #card{
        background-color: #CFC4C4;
        transition: transform 0.6s ease;
    }
    #card:hover{
        transform: scale(1.03);
    }
</style>

<body>
    <?php include('./../setting/navbar.php') ?>
    <div class="container text-center">
        <div class="row">
            <?php $db->loadalert(); ?>
            <div class="col-4 text-start">
                <button disabled="disabled" id="movie-text">Movie</button>
                <?php include("./add.php"); ?>
                <?php include("./remove.php"); ?>
            </div>
            <div class="col-4"></div>
            <div class="col-4"></div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
            <?php 
                $db->select("movie","*");
                while($fetch = $db->query->fetch_object()){
            ?>
            <div class="card col-2 col-md-4 col-lg-3 m-3" id="card" style="width: 18rem;">
                <img src="./../movie_img/<?= $fetch->pictures ?>" id="product_img" style=" object-fit:cover;" class=" mt-3 rounded img-fluid ">
                <div class="card-body">
                    <label for="" class="fw-bold fs-2"><?= $fetch->movie_name ?></label><br>
                    <label for="" class="fw-bold fs-6 text-muted ">Date <?= $fetch->date ?></label>
                    <hr>
                    <input type="submit" value="More Detail" id = "detail" disabled>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>