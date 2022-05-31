<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="../assets/css/styles.css">

    <title>Responsive bottom navigation</title>
    <style>
    .contain {
        padding: 10px;
    }
    </style>
</head>

<body>


    <!--=============== HEADER ===============-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="../index.php" class="nav__logo">Guzo</a>

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

            <img src="assets/img/profile.png" alt="" class="nav__img">
        </nav>
    </header>
    <?php
 $conn = mysqli_connect('localhost','root','','test');

 $id = 2;

 //if DB connection fails, get a error message
 if(!$conn){
     die('Connection Failed'.mysqli_connect_error());
 }

 if(isset($_POST['text'])){

     $query = "SELECT balance FROM user where id = $id ";
     $result =mysqli_query($conn,$query);
     while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["country"]. " " . $row["currency"]. "<br>";
        $balance = $row["balance"];
     }
     $text = $_POST['text'];
     $sql = "UPDATE user SET balance= $text + $balance WHERE id = $id ";

     if($conn->query($sql) === TRUE){
         ECHO "Successfully inserted";
     }else{
         echo"Error : " . $sql . "<br>" .$conn->error;
     }
 }
?>

</body>

</html>