<?php
// db = DataBase
// dbh = Database Handler
// inc = include
$serverName = "localhost";
$dbUserName = "root";
$dbPassword = "usbw";
$dbName = "loginsystem";
$dbName2 = "gip";

// maakt connectie met de database
$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName); // connectie met de loginsystem database
$conn2 = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName2); // connectie met de gip database

// checkt connectie, geeft error als er geen connectie is
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); // geeft error
}

if (!$conn2) {
    die("Connection failed: " . mysqli_connect_error()); // geeft error
}

// geen closing tagg voor foutmeldingen te voorkomen