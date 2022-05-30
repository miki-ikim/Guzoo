<?php
    //   require '_functions.php';
    //   $conn = db_connect();
    // Route JSON
    
    $rtSql = "Select * from route";
    $resultrtSql = mysqli_query($conn, $rtSql);
    $arr = array();
    if(mysqli_num_rows($resultrtSql))
        while($row = mysqli_fetch_assoc($resultrtSql))
            $arr[] = $row;
        $routeJson = json_encode($arr);
        // echo $routeJson;
    
    // Customer JSON
    $ctSql = "Select * from customer";
    $resultctSql = mysqli_query($conn, $ctSql);
    $arr = array();
    if(mysqli_num_rows($resultctSql))
        while($row = mysqli_fetch_assoc($resultctSql))
            $arr[] = $row;
    $customerJson = json_encode($arr);
    $rsall= mysqli_fetch_all($resultctSql,MYSQLI_ASSOC);
    json_encode($rsall);
    // echo $customerJson;
    // echo "<pev>";
    
    // // Seats JSON
    // $stSql = "Select * from seats";
    // $resultstSql = mysqli_query($conn, $stSql);
    // $arr = array();
    // if(mysqli_num_rows($resultstSql))
    //     while($row = mysqli_fetch_assoc($resultstSql))
    //         $arr[] = $row;
    // $seatJson = json_encode($arr);

    // Bus JSON
    $busSql = "Select * from bus";
    $resultBusSql = mysqli_query($conn, $busSql);
    $arr = array();
    while($row = mysqli_fetch_assoc($resultBusSql))
        $arr[] = $row;
    $busJson = json_encode($arr);
    // echo $busJson;

    // Booking JSON
    $bookingSql = "SELECT * FROM `booking`";
    $resultBookingSql = mysqli_query($conn, $bookingSql);
    $arr = array();
    while($row = mysqli_fetch_assoc($resultBookingSql))
        $arr[] = $row;
    $bookingJson = json_encode($arr);
    // echo $bookingJson;
    // echo "fffffffffffffffffffffffffffff";
    // $bookingData = json_decode($bookingJson);
    // echo count($bookingData);
        
    // Admin JSON
    $adminSql = "SELECT * FROM `user` WHERE `roll`='admin'";
    $resultAdminSql = mysqli_query($conn, $adminSql);
    $arr = array();
    while($row = mysqli_fetch_assoc($resultAdminSql))
        $arr[] = $row;
    $adminJson = json_encode($arr);
    // echo $adminJson;

    //Earning JSON
    // $result = mysqli_query($conn, 'SELECT SUM(booked_amount) AS value_sum FROM bookings'); 
    // $row = mysqli_fetch_assoc($result); 
    // $sum = $row['value_sum'];
    // echo $sum;
    // $earningJson = json_encode($sum);

?>