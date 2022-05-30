<?php
    require '_functions.php';
    $conn = db_connect();
    session_Start();
    
    // if(!$conn){
    //     die("Oh Shoot!! Connection Failed");
    // }

    // if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]))
    // {
        echo "moko";
        $phone = $_POST['phone'];
        $password = $_POST['pass'];

        $sql = "SELECT * FROM `user` WHERE phone_number='$phone'";
        $result = mysqli_query($conn, $sql);
        
        if($row = mysqli_fetch_assoc($result)){
             
            $hash = $row['password'];
            echo $password;
            if($password==$hash)
            {
                echo $row['password'];
                echo $password;
                // Login Sucessfull
                
                $_SESSION["loggedIn"] = true;
                $_SESSION["user_id"] = $row["User_id"];
                // $_SESSION["User_id"];
                //json for login profile
                // $arr = array();
                // while($row = mysqli_fetch_assoc($result)){
                //     $arr[] = $row;
                // }
                // $prJson = json_encode($arr);


            if($row['roll']=='admin'){
               
                header("location: ../assets/sessions/admin/dashboard.php");                
            }
            if ($row['roll']=='customer'){
                header("location: ../resource/sessions/c_s/home.php");
            }
            if ($row['roll']=='driver'){ 
                header("location: ../assets/sessions/driver/D_home.php");}
            exit;   
            // Login failure
            
        }else{
                $error = true;
            header("location:../index.php?error=$error");
            echo "i am here";
        }
    }
    
?>