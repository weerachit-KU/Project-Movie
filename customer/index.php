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
    <link rel="shortcut icon" type = "x-icon" href="./../icon/web.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../bootstrap/css/bootstrap.min.css">
    <script src="./../bootstrap/js/bootstrap.min.js"></script>
    <script src="./../bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>Main</title>
</head>
<style>
    body{
        background-color: #2E3440;
    }
</style>
<body>
    <div class="container">
        <div class="row">
            
        </div>
    </div>
</body>
</html>