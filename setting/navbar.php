<style>
    img{
        height:40px; 
        width:40px;
        margin-bottom: 10px;
        margin-left: 10px;
        border-radius: 20px;
    }
    #nav{
        background-color: #141414;
    }
    #logout{
        background-color: #F5F5F5;
        border-radius: 8px;
        font-weight: bold;
        color:#141414;
        padding: 7px;
    }
    #logout:hover{
        background-color: #BFBFBF;
        color:#121212;
    }
    #main-text{
        color:#F5F5F5;
    }
</style>
<?php
if(isset($_POST['logout'])){
    header('location:./../system/logout.php');
}
?>
<nav class="navbar navbar-expand-lg p-3 shadow" id = "nav">
            <a class="navbar-brand" href="index.php">
                <img src="./../icon/web.jpg" alt="">
            </a>
            <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto me-auto">
                    <li class = "nav-item">
                        <label for="" class = "fw-bolder text-capitalize fs-2" id = "main-text">Absolute Cinema</label>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <form action="" method="post"><input type="submit" value="  Logout  " onclick = "return confirm('You want to logout?')" name = "logout" id = "logout"></form>
                    </li>
                </ul>
            </div>
    </nav>