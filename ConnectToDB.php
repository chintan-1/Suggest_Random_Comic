<?php
    $ServerName='localhost';
    $Username='YOUR_USER_NAME';
    $Password='YOUR_WEBSERVER_PASSWORD';
    $DatabaseName='Your_Database_Name';
    $conn=mysqli_connect($ServerName,$Username,$Password,$DatabaseName);
    if(!$conn)
        die("Failed to connect to database.".mysqli_connect_error());
?>
