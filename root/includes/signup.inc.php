<?php

    // kijkt of de signup.inc.php pagina word aangesproken door de registreer knop en niet gewoon door een url.
    if (isset($_POST["submit"])) {

        // echo "it works"; 
        // neemt de data van de signup.php pagina via de POST methode en zet het in een variabele
        $name = $_POST["name"];
        $email = $_POST["email"];
        $username = $_POST["uid"];
        $pwd = $_POST["pwd"];
        $pwdRepeat = $_POST["pwd-repeat"];

        // zorgt ervoor dat de code uit de andere pagina's kan gebruikt worden door de code hier in te laden.
        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        // roept code aan uit function.inc.php voor de errorhandlers.
        // kijkt of de velden leeg zijn
        if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false) {
            header("location: ../pages/signup.php?error=emptyinput"); // toont de error code in de url
            exit(); // zorgt ervoor dat de code stopt.
        }
        // kijkt of de gebruikersnaam juist is
        if (invalidUid($username) !== false) {
            header("location: ../pages/signup.php?error=invaliduid"); // toont de error code in de url
            exit(); // zorgt ervoor dat de code stopt.
        }
        // kijkt of de email juist is
        if (invalidEmail($email) !== false) {
            header("location: ../pages/signup.php?error=invalidemail"); // toont de error code in de url
            exit(); // zorgt ervoor dat de code stopt.
        }
        // kijkt of de wachtwoorden overeen komen
        if (pwdMatch($pwd, $pwdRepeat) !== false) {
            header("location: ../pages/signup.php?error=passwordsdontmatch"); // toont de error code in de url
            exit(); // zorgt ervoor dat de code stopt.
        }
        // kijkt of de gebruikersnaam en email al bestaat
        if (uidExists($conn, $username, $email) !== false) {
            header("location: ../pages/signup.php?error=usernametaken"); // toont de error code in de url
            exit(); // zorgt ervoor dat de code stopt.
        }

        // maakt de gebruiker aan
        createUser($conn, $name, $email, $username, $pwd);
    } // gaat terug naar de signup.php pagina als de registratie goed is gegaan.
    else{
        header("location: ../pages/signup.php"); // toont de error code in de url
        exit(); // zorgt ervoor dat de code stopt.
    }

