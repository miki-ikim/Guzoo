<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add a default marker to a web map</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
<link href="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.js"></script>
<link rel="stylesheet" href="../../../resource/css/style_db.css">
<style>
body { margin: 0; padding: 0; }
#map { position: absolute; top: 0; bottom: 0; width: 100%; }
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
                  ?> 
     
    
<body>
<h2>Route Info</h2><br>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">


<table style="width:50%;" class="table table-bordered">
<?php
$sql = "SELECT * FROM `route` WHERE `route_Id` = '$msg'";
$rs = mysqli_query($conn, $sql);

 
           
        if ($rs->num_rows >0) {
           
     while($row = $rs->fetch_assoc()) {
            
        echo "
                    <tr>
                                <th>Id</th>
                                <td >". $row["route_Id"]."</td>
                                
                            </tr>
                            <tr>
                                <th>Origin</th>
                                <td >". $row["Intial_station"]."</td>
                                </tr>
                            <tr>
                                <th>Through</th>
                                <td >". $row["through"]."</td>
                            </tr>
                            <tr>
                                <th>Destinetion </th>
                                <td >". $row["Final_Station"]."</td>
                            </tr>
                            <tr>
                                <th>Distance</th>
                                <td >". $row["distance"]."</td>
                                <td><input type=text' name='fname'><input type='submit' value='Update'></td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td >". $row["price"]."</td>
                                <td><input type='text' name='fname'><input type='submit' value='Update'></td>
                            </tr>
                            
                                <th>Bus Number</th>
                                <td >". $row["Bus_number"]."</td>
                                <td><input type='text' name='fname'><input type='submit' value='Update'></td>
                            </tr>
                            ";

    }
    
}   

?>  

                        <tbody>
                            

                    </table>
 
    </form>



<div id="map"></div>

<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoibWlraWlraW0iLCJhIjoiY2wyNGRpdmU4MXlqazNjbWs0bzBpOTlmOSJ9.d3jGhVhIcVljhcqZLIbgcA';
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [12.550343, 55.665957],
        zoom: 8
    });

    // // Create a default Marker and add it to the map.
    // const marker1 = new mapboxgl.Marker()
    //     .setLngLat([9.0116728896905, 38.800402120270846])
    //     .addTo(map);

    // // Create a default Marker, colored black, rotated 45 degrees.
    // const marker2 = new mapboxgl.Marker({ color: 'black', rotation: 45 })
    //     .setLngLat([9.016137727501635, 38.78649644068109])
    //     .addTo(map);
    //  const marker3 = new mapboxgl.Marker({ color: 'black', rotation: 45 })
    //     .setLngLat([9.016137727401635, 38.78669644068109])
    //     .addTo(map);
</script>
<script src="resource/js/main.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>     