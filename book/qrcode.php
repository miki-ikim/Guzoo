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

            <img src="../assets/img/profile.png" alt="" class="nav__img">
        </nav>
    </header>

    <div class="contain">
        <div class="row">
            <div class="col-md-6">
                <h3>Scan Your GUZO Card Here!</h3>
                <video id="preview"></video>

            </div>
            <div class="col-md-6">
                <form action="insert.php" method="post" class="form-horizontal">
                    <label>SCAN QR CODE</label>
                    <input type="text" name="text" id="text" placeholder="Scan QRCODE" class="form-control">

                </form>
            </div>
        </div>


    </div>


    <script>
    let scanner = new Instascan.Scanner({
        video: document.getElementById('preview')
    });

    Instascan.Camera.getCameras().then(function(cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            console.error('No cameras found.');
        }
    }).catch(function(e) {
        console.error(e);
    });

    scanner.addListener('scan', function(content) {
        document.getElementById('text').value = content;
        document.forms[0].submit();
    });
    </script>






</body>

</html>