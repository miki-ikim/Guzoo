<?php
session_start();
//build the connection variable and assign database credentials
$conn = mysqli_connect('localhost','root','','test');

//if DB connection fails, get a error message
if(!$conn){
    die('Connection Failed'.mysqli_connect_error());
}
if (isset($_POST['searchBox'])) {
$input = $_POST['searchBox'];
$query = "SELECT * FROM locations WHERE station LIKE '%$input%'";
$result =mysqli_query($conn,$query);
$count = mysqli_num_rows($result);

if ($count==0) {
    $output = "no result";
  // output data of each row
}else{
   
  while($row = mysqli_fetch_assoc($result)) {
    //echo "id: " . $row["id"]. " - Name: " . $row["country"]. " " . $row["currency"]. "<br>";
    $lat=$row['lat'];
				$lng=$row['lng'];
				$id=$row['id'];
                $station=$row['station'];
				$output ='<div> '. $lat. ' '.$lng. '</div>';

						
} 
 
}
  // update location with location_status if admin location_status.
 
}
$_SESSION['station'] = $station;
$_SESSION['super'] = $output;
$_SESSION['lat'] = $lat;
$_SESSION['lng'] = $lng;
$_SESSION['input'] = $input;

?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <link href="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.js"></script>

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="../assets/css/styles.css">

    <title>Responsive bottom navigation</title>
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

            <img src="assets/img/perfil.png" alt="" class="nav__img">
        </nav>
    </header>


    <style>
    .search {
        position: absolute;
        left: 120px;
        bottom: 0;
        height: 50%;
    }
    </style>

    <div class="search">

        <div class="col-lg-12">
            <div class="col-lg-12"></div>
            <div class="col-lg-12">
                <br>

                <h3 style="margin-top: 100px; "> <?php
            
            echo "Your Current Location:",($station);
            ?></h3>


                <br>

                <form action="dest.php" method="POST">
                    <center>
                        <h3>Search your Destination</h3>
                    </center>
                    <br>
                    <input type="text" id="search" name="search" class="form-control" autocomplete="off"
                        placeholder="Type name of a country" required="required">

                    <div id="result"></div>
                    <br>

                    <center>
                        <button type="submit" name="submit" class="btn btn-primary">Search</button>
                    </center>
                </form>
                <div class="success"></div>

            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
    <style>
    #map {
        position: absolute;
        top: 0;
        width: 100%;
        height: 60%;
    }
    </style>

    <div id="map"></div>
    <script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiYmlyaGFuZW0iLCJhIjoiY2wyN2lleXo0MDB3ajNpbGxkaDM2b3Y2cCJ9.3pqPJZ89Nsen6Jlb7i9g1A';
    const map = new mapboxgl.Map({
        container: 'map', // container ID
        style: 'mapbox://styles/mapbox/streets-v11', // style URL
        center: [38.7578, 8.9806], // starting position
        zoom: 11 // starting zoom
    });
    var lat = "<?php echo $lat ?>";
    var lng = "<?php echo $lng ?>";
    const popup = new mapboxgl.Popup({
        offset: 25
    }).setText(
        lng
    );
    const marker1 = new mapboxgl.Marker({
            color: 'black'



        })
        .setLngLat([lng, lat])
        .setPopup(popup)
        .addTo(map);
    </script>




    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>

</body>

</html>