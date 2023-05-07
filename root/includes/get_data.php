<?php // maakt connectie met de database en selecteert alles van de artikelen tabel en zet het in een array en zet het om naar json voor de zoekbalk
$servername = "localhost";
$username = "root";
$password = "usbw";

$conn = new mysqli($servername, $username, $password, "gip"); // connectie met de gip database
$result = mysqli_query($conn, "SELECT * FROM artikelen"); // selecteert alles van de artikelen tabel

$emparray = array(); // maakt een array
while($row =mysqli_fetch_assoc($result)){ // zet de resultaten in een array
    $emparray[] = $row;
}

echo json_encode($emparray); // zet de array om naar json

mysqli_close($conn); // sluit de connectie