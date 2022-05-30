<?php
    require '_functions.php';

    $conn = db_connect();

    if(!$conn)
        die("Oh Shoot!! Connection Failed");
      

    // if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"]))
    // {
        // echo "<pre>";
        // var_export($_POST);
        // echo "</pre>";

        $fullName = $_POST["fname"] . " " . $_POST["lname"];
        $fName = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["pass"]; 
        $balalnce="0";
        $roll="customer";
        echo  ",mm";

        // Check if the username already exists
        $user_exists = exist_user($conn, $fName);
        $signup_sucess = false;

        if(!$user_exists)
        {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `user`(`Phone_number`, `First_Name`, `Last_Name`, `password`, `email`, `roll`) VALUES ('$phone','$fName','$lname','$password','$email','$roll')";
            $sql1 ="INSERT INTO `customer`( `customer_name`, `customer_phone`, `balance`) VALUES ('$fullName','$phone','$balalnce')";
            $result = mysqli_query($conn, $sql);
            $result1 = mysqli_query($conn, $sql1);
            
            if($result){
                $signup_sucess = true;
            }
        }

        // Redirect Page
         header("location: ../index.php?signup=$signup_sucess&user_exists=$user_exists");
    

?>