<?php 
session_start();?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="../assets/css/styles.css">

    <title>Responsive bottom navigation</title>
    <style>
    /*
 *	TICKET
 *	---------------------------------------------
 */

    .ticket-wrap {
        text-align: center;
    }

    .ticket {
        position: relative;
        top: 200px;
        display: inline-block;
        margin: 0 auto;
        border: 2px solid #9facbc;
        font-family: "Variable Bahnschrift", "FF DIN", "Franklin Gothic", "Helvetica Neue", sans-serif;
        font-feature-settings: "kern"1;
        background: #fff;
    }

    .ticket__header {
        margin: 0;
        padding: 1.5em;
        background: #f4f5f6;
    }

    .ticket__co span,
    .ticket__route span {
        display: block;
    }

    .ticket__co {
        display: inline-block;
        position: relative;
        padding-left: 5em;
        line-height: 1;
        color: #5e7186;
    }

    .ticket__co-icon {
        position: absolute;
        top: 75%;
        margin-top: -2em;
        left: 0;
        width: 4em;
        height: auto;

    }

    .ticket__co-name {
        font-size: 2.5em;
        font-variation-settings: "wght"500, "wdth"75;
        letter-spacing: -.01em;
    }

    .ticket__co-subname {
        font-variation-settings: "wght"700;
        color: #506072;
    }

    .ticket__body {
        padding: 2rem 1.25em 1.25em;
    }

    .ticket__route {
        font-variation-settings: "wght"300;
        font-size: 2em;
        line-height: 1.1;
    }

    .ticket__description {
        margin-top: .5em;
        font-variation-settings: "wght"350;
        font-size: 1.125em;
        color: #506072;
    }

    .ticket__timing {
        display: flex;
        align-items: center;
        margin-top: 1rem;
        padding: 1rem 0;
        border-top: 2px solid #9facbc;
        border-bottom: 2px solid #9facbc;
        text-align: left;
    }

    .ticket__timing p {
        margin: 0 1rem 0 0;
        padding-right: 1rem;
        border-right: 2px solid #9facbc;
        line-height: 1;
    }

    .ticket__timing p:last-child {
        margin: 0;
        padding: 0;
        border-right: 0;
    }

    .ticket__small-label {
        display: block;
        margin-bottom: .5em;
        font-variation-settings: "wght"300;
        font-size: .875em;
        color: #506072;
    }

    .ticket__detail {
        font-variation-settings: "wght"700;
        font-size: 1.25em;
        color: #424f5e;
    }

    .ticket__admit {
        margin-top: 2rem;
        font-size: 2.5em;
        font-variation-settings: "wght"700, "wdth"85;
        line-height: 1;
        color: #657990;
    }

    .ticket__fine-print {
        margin-top: 1rem;
        font-variation-settings: "wdth"75;
        color: #666;
    }

    .ticket__barcode {
        margin-top: 1.25em;
        width: 299px;
        max-width: 100%;
    }
    </style>
</head>

<body>


    <!--=============== HEADER ===============-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="index.php" class="nav__logo">Guzo</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="../index.php" class="nav__link active-link ">
                            <i class='bx bx-home-alt nav__icon'></i>
                            <span class="nav__name">Home</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="../station.php" class="nav__link ">
                            <i class='bx  bx-map nav__icon'></i>
                            <span class="nav__name">Stations</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="../route.php" class="nav__link">
                            <i class='bx bxs-direction-right nav__icon'></i>
                            <span class="nav__name">Routes</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="../bus.php" class="nav__link ">
                            <i class='bx bx-bus nav__icon'></i>
                            <span class="nav__name">Bus</span>
                        </a>
                    </li>


                    <li class="nav__item">
                        <a href="../wallet.php" class="nav__link">
                            <i class='bx bx-briefcase-alt nav__icon'></i>
                            <span class="nav__name">Wallet</span>
                        </a>
                    </li>
                </ul>
            </div>

            <img src="assets/img/perfil.png" alt="" class="nav__img">
        </nav>
    </header>

    <div class="l-col-right ticket-wrap" aria-label="A fake boat ticket demonstrating mixing font weights and widths">
        <div class="ticket" aria-hidden="true">
            <div class="ticket__header">
                <div class="ticket__co">
                    <div class="ticket__co-icon">
                        <img src="../assets/img/purple.png" alt="" class="nav__img">
                    </div>

                    <span class="ticket__co-name">Guzo Ticket</span>
                    <span class="u-upper ticket__co-subname">The ticket will only be used for one trip</span>
                </div>
            </div>
            <div class="ticket__body">
                <p class="ticket__route">Winter Wonderland</p>
                <p class="ticket__description">A four-hour tour of the Strait of Garamond</p>
                <div class="ticket__timing">
                    <p>
                        <span class="u-upper ticket__small-label">Current Station</span>
                        <span class="ticket__detail"><?php
            
            echo $_SESSION['station'];?></span>
                    </p>
                    <p>
                        <span class="u-upper ticket__small-label">Destination</span>
                        <span class="ticket__detail"><?php
            
            echo $_SESSION['dest'];?></span>
                    </p>
                    <p>
                        <span class="u-upper ticket__small-label">Price</span>
                        <span class="ticket__detail"><?php
            
            echo $_SESSION['price'];?></span>
                    </p>
                </div>
                <p class="ticket__fine-print">This ticket cannot be transferred to another voyage</p>
                <h1 class="u-upper ticket__admit">BUS NUMBER:<?php
            
            echo $_SESSION['bus'];?> </h1>
                <img class="ticket__barcode" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/515428/barcode.png"
                    alt="Fake barcode" />
            </div>
        </div>
    </div>
    <?php


//build the connection variable and assign database credentials
$conn = mysqli_connect('localhost','root','','test');

//if DB connection fails, get a error message
if(!$conn){
    die('Connection Failed'.mysqli_connect_error());
}
$id=2;

$query = "SELECT balance FROM user where id = $id ";
     $result =mysqli_query($conn,$query);
     while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["country"]. " " . $row["currency"]. "<br>";
        $balance = $row["balance"];
     }
$price = $_SESSION['price'];
$sq = "UPDATE user SET balance= balance - $price WHERE id = $id ";

if($balance > $price) {
    if ($conn->query($sq) === TRUE) {
        
        $messag = "YOU HAVE SUCCESFULLY BOOKED YOUR TICKET";
    echo "<script type='text/javascript'>alert('$messag');</script>";
    }

}else{
    $message = "Insufficent Balance";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script>window.location.href='../wallet.php';</script>";
    
    exit;
}


?>




</body>

</html>