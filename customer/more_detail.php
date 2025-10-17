<?php
session_start();
include("../db.php");
$db = new db();
$db->checklogin();
if (isset($_GET['movie_id'])) {
    $id = $_GET['movie_id'];
    $userid = $_SESSION['userid'];
    $db->select("movie", "*", "movie_id = '$id'");
    $detail = $db->query->fetch_object();
} else {
    header('location:./index.php');
}
if (isset($_POST['selectedSeatsSilver'])) {
    $selectedSeatsSilver = isset($_POST['selectedSeatsSilver']) ? htmlspecialchars($_POST['selectedSeatsSilver']) : 'No seats selected';
    $totalPrice = isset($_POST['totalPrice']) ? htmlspecialchars($_POST['totalPrice']) : '0';
    $db3 = new db();
    $db3->select("movie","*","movie_id = '$id'");
    if($db3->query->num_rows > 0){
        $seat = $db3->query->fetch_object();
        $s = $seat->m_seat;
        $st = "$s,$selectedSeatsSilver";
        $list = [
            'm_seat' => $st
        ];
        $db3->update("movie",$list,"movie_id = '$id'");
    }
    $list = [
        'movie_id' => $id,
        'user_id' => $userid,
        'price' => $totalPrice,
        'seat' => $selectedSeatsSilver
    ];
    $db->insert("payment", $list);
    if ($db->query) {
        $db->setalert("success", "Movie booking Successfully!");
        return;
    } else {
        $db->setalert("error", "Something Error on code!");
        return;
    }
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

    #screen {
        font-size: xx-large;
        font-weight: bold;
    }

    #product_img {
        height: 280px;
        width: 250px;
    }

    #back {
        background-color: #E8E8E8;
        font-weight: bold;
        border-radius: 6px;
    }

    #back:hover {
        background-color: #CFCFCF;
        border-radius: 6px;
    }

    .seat {
        width: 40px;
        height: 40px;
        margin: 5px;
        text-align: center;
        line-height: 40px;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .seat.available {
        background-color: #28a745;
        color: #fff;
    }

    .seat.selected {
        background-color: #ffc107;
        color: #000;
    }

    .seat.occupied {
        background-color: #6c757d;
        color: #fff;
        cursor: not-allowed;
    }

    .seat-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    #pay {
        border-radius: 10px;
        font-weight: bold;
        background-color: #28a745;
        color: white;
    }

    #pay:hover {
        border-radius: 10px;
        font-weight: bold;
        background-color: #6C8569;
        color: black;
    }
</style>

<body>
    <?php include("./../setting/navbar_customer.php") ?>
    <div class="container text-center">
        
        <div class="" style="height:110px;"></div>
        <?php $db->loadalert(); ?>
        <div class="row flex-nowrap">
            <div class="col-2 col-md-4 col-lg-3 d-flex flex-column justify-content-between">
                <div class="card">
                    <div class="card-body" style="height:450px;">
                        <img src="./../movie_img/<?= $detail->pictures ?>" id="product_img" style="" class=" mt-3 rounded card-img-top">
                        <label for="" class="fw-bold fs-3 "><?= $detail->movie_name ?></label> <br>
                        <label for="" class="fw-bold fs-6 text-muted ">Date : <?= $detail->date ?> </label>
                        <label for="" class="fw-bold fs-6 text-muted ">Time : <?= $detail->time ?> </label> <br>
                        <label for="" class="fw-bold fs-6 text-muted ">Duration : <?= $detail->duration ?> </label>
                    </div>
                </div>
            </div>
            <div class="col-10 col-md-8 col-lg-9 ms-4">

                <div class="row">
                    <div class="card">
                        <div class="card-body" style="height:100px;">
                            <p id="screen">Screen</p>
                        </div>
                    </div>
                </div>
                <div class="" style="height:50px;"></div>
                <?php
                $rows = "AF";
                $start = $rows[0];
                $end = $rows[1];
                $db2 = new db();
                $db2->select("movie", "*", "movie_id = '$id'");
                if ($db2->query->num_rows > 0) {
                    $seat = $db2->query->fetch_object();
                    $silver = explode(',', $seat->m_seat);
                } else {
                    $silver = explode(',', "");
                }
                for ($row = $start; $row <= $end; $row++) {
                    echo "<div class='seat-container'>";
                    $Seats = 6;
                    for ($i = 1; $i <= $Seats; $i++) {
                        $seatNum = $row . $i;

                        // $isOccupied = false; // Randomly occupy seats
                        $class =  (in_array($seatNum, $silver))  ? "occupied" : "available";
                        echo "<div class='seat $class me-3' data-price='80' data-seat='$seatNum' onclick='selectSeatsilver(this)'>$seatNum</div>";
                    }
                    echo "</div>";
                }
                ?>
                <div class="row mt-5 me-4" style="">
                    <div class="col-4"></div>
                    <div class="col-4"></div>
                    <div class="col-4 text-end">
                        <div class="fw-bold fs-5" style="color:white;">Total Price: <span id="totalPrice"> 0 Bath.</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="" style="height:30px;"></div>
        <div class="row">
            <div class="col-4 text-start">
                <a href="./index.php" class=""><button id="back">Back to Homepage</button></a>
            </div>
            <div class="col-4"></div>
            <div class="col-4 text-end">
                <button type="button" class="text-end" id="pay" onclick="proceedToPayment()">Confirm and Pay</button>
                <form id="paymentForm" action="<?php echo $_SERVER["PHP_SELF"]; ?>?movie_id=<?= $id ?>" method="POST" style="display: none;">
                    <input type="hidden" name="selectedSeatsSilver" id="formSelectedSeatsSilver">
                    <input type="hidden" name="totalPrice" id="formTotalPrice">
                    <input type="hidden" name="show_id" id="formuserId" value="<?= $id; ?>">
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    let selectedSeatssilver = [];
    let selectedseats = [];
    let totalPrice = 0;

    function selectSeatsilver(element) {
        if (element.classList.contains('occupied')) return;

        const price = parseInt(element.getAttribute('data-price'));
        const seat = element.getAttribute('data-seat');

        if (element.classList.contains('selected')) {
            element.classList.remove('selected');
            selectedSeatssilver = selectedSeatssilver.filter(s => s !== seat);
            totalPrice -= price;
        } else {
            element.classList.add('selected');
            selectedSeatssilver.push(seat);
            totalPrice += price;
        }

        document.getElementById('totalPrice').textContent = ` ${totalPrice} Bath.`;
    }

    function proceedToPayment() {
        if (selectedSeatssilver.length === 0) {
            alert("Please select at least one seat to proceed.");
            return;
        }
        // selectedseats=selectSeatsilver+selectedSeatsgold;
        document.getElementById('formSelectedSeatsSilver').value = selectedSeatssilver.join(',');
        document.getElementById('formTotalPrice').value = totalPrice;

        document.getElementById('paymentForm').submit();
    }
</script>

</html>