<?php
session_start();
include("../db.php");
$db = new db();
if(isset($_SESSION['userid'])){
    if($_SESSION['userid'] == 1){
        header('location:./../' . $_SESSION['typeuser']. '/index.php');
    }else{
        header('location:./../' . $_SESSION['typeuser']. '/index.php');
    }
}
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $db->select("user,type_user","*","username = '$username' AND typeuser_id = user_type");
    $userdata = $db->query->fetch_object();
    if($db->query->num_rows > 0){
        if($userdata->password == $password){
            $_SESSION['userid'] = $userdata->user_id;
            $_SESSION['username'] = $userdata->username;
            $_SESSION['typeuser'] = $userdata->name_type;
            if($_SESSION['typeuser'] == 'admin'){
                header('location:./../' . $_SESSION['typeuser']. '/index.php');
            }else{
                header('location:./../' . $_SESSION['typeuser']. '/index.php');
            }
        }else{
            $db->setalert("warning","Password was wrong");
            return;
        }
    }else{
        $db->setalert("warning","Username was wrong");
        return;
    }
}
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
    <title>Login</title>
</head>
<style>
    body{
        background-color: #2E3440;
    }
    #lb{

        background-color:#2E3440;
        border-radius:10px;
        color:white;
    }
    #lb:hover{
        color:#2E3440;
        background-color:slategray;
    }
    #br{
        text-decoration:none; 
        color:red;
    }
    #br:hover{
        color:coral;
    }
    img{
        height:15px; 
        width:15px;
    }
</style>
<body>
    <div class="container text-center">
        <div class="" style = "height:150px;"></div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <?php $db->loadalert(); ?>
                        <p class="text-center text-header mt-3 fs-2 fw-bold" >Login</p>
                        <form action="" method="post">
                                <div class="input-group mt-4">
                                    <div class="input-group-text"><img src="./../icon/user.png" alt=""></div>    
                                    <input type="text" name="username" class="form-control bg-light" style="" placeholder="Username" required>
                                </div>
                                <div class="input-group mt-2">
                                    <div class="input-group-text"><img src="./../icon/lock.png" alt=""></div>
                                    <input type="password" name="password" class="form-control bg-light" style="" placeholder="Password" required>
                                </div>
                                <input type="submit" value="  Login  " name="login" class="mb-3 mt-4 ms-3 fw-bold " id="lb">
                        </form>
                        <hr>
                        <p class = "h-4 text-center">if you don't have an account <a href="./register.php"  onclick="return confirm('You want to go Register?')" id = "br" style="">Register</a></p>
                    </div>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
</body>
</html>