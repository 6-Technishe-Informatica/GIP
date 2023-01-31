<?php

// checked of de gebruiker een admin is
if (isset($_POST["addAdminUser"])) {
    
    $name = $_POST["naam"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    // kijkt of de gebruikersnaam juist is
    if (invalidUid($username) !== false) {
        header("location: ../pages/admin.php?error=invaliduid"); // toont de error code in de url
        exit(); // zorgt ervoor dat de code stopt.
    }
    // kijkt of de email juist is
    if (invalidEmail($email) !== false) {
        header("location: ../pages/admin.php?error=invalidemail"); // toont de error code in de url
        exit(); // zorgt ervoor dat de code stopt.
    }
    // kijkt of de gebruikersnaam en email al bestaat
    if (uidExists($conn, $username, $email) !== false) {
        header("location: ../pages/admin.php?error=usernametaken"); // toont de error code in de url
        exit(); // zorgt ervoor dat de code stopt.
    }

    createUser($conn, $name, $email, $username, $password, 1);

    
}
