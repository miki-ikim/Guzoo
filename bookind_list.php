<?php  require '../../libs/_admin-header.php';
        require '../../libs/_getJSON.php';

        // table data
        $sql = "SELECT * FROM `customer` ";
        $rs = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../../resource/css/style_db.css">
</head>
 
<body>
    
            <!-- ======================= Cards ================== -->
            <!-- <div class="cardBox">
                
            </div> -->
    <!-- =============== Navigation ================ -->
    

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="">
                    <div class="">
                        
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>full Name</td>
                                <td>phone</td>
                                
                                <td>Action</td>
                            </tr>
                        </thead>

                        <tbody><?php
        if ($rs->num_rows >0) {
     while($row = $rs->fetch_assoc()) {
        echo "
                <tr>
                <td data-label='name'>" . $row["customer_id"]. "</td>
                
                <td data-label='age'> " . $row["customer_name"]. " </td>
            
              <td data-label='sex'> " . $row["customer_phone"]. " </td>
             
               <td data-label='sex'> <a href='detail_pg/route_detail.php'>Detail</a> </td>
              
             

              </tr>";

    }
    
}   

?>                     </tbody>
                    </table>
                </div>

   
            </div>
        
   
    <!-- =========== Scripts =========  -->
    <script src="resource/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>