<?php
$servername = "localhost";
$username = "root";
$password = "usbw";

$conn = new mysqli($servername, $username, $password, "gip");
$result = mysqli_query($conn, "SELECT * FROM artikelen");


//create an array
$emparray = array();
while($row =mysqli_fetch_assoc($result)){
    $emparray[] = $row;
}

// Convert JSON data from an array to a string
echo json_encode($emparray);

//close the db connection
mysqli_close($conn);