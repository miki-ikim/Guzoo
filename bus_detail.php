<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add a default marker to a web map</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
<link rel="stylesheet" href="../../../resource/css/style_db.css">
<link href="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.js"></script>


<style>
body { margin: 0; padding: 0; }
#map { width: 25%; height: 200px; }
</style>
</head>
    <style>
table, th, td {
  border:1px solid black;
}
       
        
</style >
    <?php 
     require '../../../libs/_admin-header.php'; 
    $msg=" ";
    //  require '../../../libs/_functions.php';
    // $conn = db_connect();
    //session_Start();
    
    global $rid;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $name = htmlspecialchars($_REQUEST['fname']);
        $name1= $_REQUEST['fname'];
        if (empty($name)) {
            echo "Name is empty";
        } else {
            echo $name;
        }}
        
        @$msg = $_REQUEST['msg'];
                // echo $msg;
    ?> 
     
    
<body>
    <div >
<h2>Route Info</h2><br>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">


<table style="width:50%;" class="table table-bordered">
<?php
$sql = "SELECT * FROM `bus` WHERE `bus_id` = '$msg'";
$rs = mysqli_query($conn, $sql);

 
           
        if ($rs->num_rows >0) {
           
     while($row = $rs->fetch_assoc()) {
            $coord=$row["bus_address"];
        echo "
                    <tr>
                                <th>Id</th>
                                <td >". $row["bus_id"]."</td>
                                
                            </tr>
                            <tr>
                                <th>Band</th>
                                <td >". $row["brand"]."</td>
                                </tr>
                            <tr>
                                <th>plate number</th>
                                <td >". $row["plate_number"]."</td>
                            </tr>
                            <tr>
                                <th>Driver name </th>
                                <td >". $row["Driver_Id"]."</td>
                            </tr>
                            <tr>
                                <th>Route id</th>
                                <td >". $row["route_id"]."</td>
                                
                            </tr>
                            
                            
                                <th>Bus Status</th>
                                <td >". $row["bus_description"]."</td>
                                
                            </tr>
                            ";

    }
    
}   
$arr[] = $coord;
$customerJson = json_encode($arr);
echo $coord;
?>  

                        <tbody>
                            

                    </table>
 
    </form>


    <p id="demo"></p>
<div class="container" id="map"></div>

<script>
    const xmlhttp = new XMLHttpRequest();
xmlhttp.onload = function() {
  const myObj = JSON.parse(this.responseText);
  document.getElementById("demo").innerHTML = myObj.name;
}
xmlhttp.open("GET", "demo_file.php");
xmlhttp.send();
    // var coord =myobj;

	mapboxgl.accessToken = 'pk.eyJ1IjoibWlraWlraW0iLCJhIjoiY2wzYnRremN2MDBsdDNqcnhvcDFhNTY5aCJ9.EoI7zg7Zcm1fCaDrR342Fg';
const map = new mapboxgl.Map({
container: 'map',
style: 'mapbox://styles/mapbox/streets-v11',
center: [38.801076,9.019405],
zoom: 15
});
 
// Create a default Marker and add it to the map.
const marker1 = new mapboxgl.Marker()
.setLngLat([38.801076,9.019405])
.addTo(map);
 
// // Create a default Marker, colored black, rotated 45 degrees.
// const marker2 = new mapboxgl.Marker({ color: 'black', rotation: 45 })
// .setLngLat([12.65147, 55.608166])
// .addTo(map);
</script>
<script src="resource/js/main.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>     