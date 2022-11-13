<?php
    session_start();
    $server="localhost";
    $username="sid3008";
    $password="Sid@30082002";
    $db="mysql";
    $t= $_SESSION['logged_user'];
    $conn = new mysqli($server,$username,$password,$db);
    if($conn->connect_error){
        die("Connection failed".mysqli_connect_error());
    }
      $result= $conn->query ("SELECT * FROM ride_details where cid = '$t' ");
      $row = $result->fetch_assoc();
      

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Details of shuttle</title>
    </head>

    <body>
       
        
            <?php echo "<h2>Name:".$row['dname']."</h2>";?>
            <?php echo "<p>".$row['source']."->".$row ['destination']."</p>";?>
            <?php echo "<p> Time:".$row['ride_time']."</p>";?>
            <?php echo "<p>Car:".$row['c_type']."</p>";?>
           

    </body>
</html>
