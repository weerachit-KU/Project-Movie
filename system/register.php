<?php
session_start();
include("../db.php");
$db = new db();
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $email = $_POST['email'];
    $typeuser = 1;
    if($password1 != $password2){
        $db->setalert("warning", "Your Confirm-Password is wrong. try again");
        return;
    }else{
            $list  = [
                'username' => $username,
                'password' => $password1,
                'email' => $email,
                'user_type' => $typeuser
            ];
            $db->select("user","*","email = '$email'");
            if($db->query->num_rows > 0){
                $db->setalert("warning", "This Email already used");
                return;
            }else{
                $rowinsert = $db->insertwhere("user",$list,"(SELECT * FROM user WHERE username = '$username')");
                if($rowinsert > 0){
                    $db->setalert("success", "Register successfully !");
                    return;
                }else{
                    $db->setalert("error", "This username already used");
                    return;
                }
            }
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
    <title>Register</title>
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
                        <p class="text-center mt-3 fs-2 fw-bold" >Register</p>
                        <form action="" method="post">
                                <div class="input-group mt-4">
                                    <div class="input-group-text"><img src="./../icon/user.png" alt=""></div>
                                    <input type="text" name="username" class="form-control bg-light" style="" placeholder="Username" required>
                                </div>
                                <div class="input-group mt-2">
                                    <div class="input-group-text"><img src="./../icon/lock.png"  alt=""></div>
                                    <input type="password" name="password1" class="form-control bg-light" style="" placeholder="Password" required>
                                </div>
                                <div class="input-group mt-2">
                                    <div class="input-group-text"><img src="./../icon/lock.png"  alt=""></div>
                                    <input type="password" name="password2" class="form-control bg-light" style="" placeholder="Confirm-Password" required>
                                </div>
                                <div class="input-group mt-2">
                                    <div class="input-group-text"><img src="./../icon/mail.png"  alt=""></div>
                                    <input type="email" name="email" class="form-control bg-light" style="" placeholder="Email" required>
                                </div>
                                <input type="submit" value="  Register  " name="register" class="mb-3 mt-4 ms-3 fw-bold " id="lb">
                        </form>
                        <hr>
                        <p class = "h-4 text-center">if you already have an account <a href="./login.php" onclick="return confirm('You want to go Login?')" id = "br" style="">Login</a></p>
                    </div>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
</body>
</html>