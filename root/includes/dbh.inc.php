<?php   
    // db = DataBase
    // dbh = Database Handler
    // inc = include
    $serverName = "localhost";
    $dbUserName = "root";
    $dbPassword = "usbw";
    $dbName = "loginsystem";

    // maakt connectie met de database
    $conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

    // checkt connectie, geeft error als er geen connectie is
    if (!$conn) {
        die("Connection failed: ".mysqli_connect_error());
    }

    // geen closing tagg voor foutmeldingen te voorkomen