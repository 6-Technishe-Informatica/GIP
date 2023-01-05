<?php   
    // db = DataBase
    // dbh = Database Handler
    // inc = include
    $serverName = "localhost";
    $dbUserName = "root";
    $dbPassword = "usbw";
    $dbName = "loginSystem";

    // maakt connectie met de database
    $conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

    // checkt connectie
    if (!$conn) {
        die("Connection failed: ".mysqli_connect_error());
    }