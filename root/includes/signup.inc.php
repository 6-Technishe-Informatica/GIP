<?php

    // kijkt of de signup.inc.php pagina word aangesproken door de registreer knop en niet gewoon door een url.
    if (isset($_POST["submit"])) {

        // echo "it works"; 
        $name = $_POST["name"];
        $email = $_POST["email"];
        $username = $_POST["uid"];
        $pwd = $_POST["pwd"];
        $pwdRepeat = $_POST["pwd-repeat"];

        // zorgt ervoor dat de code uit de andere pagina's word gebruikt.
        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        // errorhandlers, code uit funcions.inc.php
        // kijkt of de velden leeg zijn
        if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false) {
            header("location: ../pages/signup.php?error=emptyinput");
            exit(); // zorgt ervoor dat de code stopt.
        }
        // kijkt of de gebruikersnaam juist is
        if (invalidUid($username) !== false) {
            header("location: ../pages/signup.php?error=invaliduid");
            exit(); // zorgt ervoor dat de code stopt.
        }
        // kijkt of de email juist is
        if (invalidEmail($email) !== false) {
            header("location: ../pages/signup.php?error=invalidemail");
            exit(); // zorgt ervoor dat de code stopt.
        }
        // kijkt of de wachtwoorden overeen komen
        if (invalidPassword($pwd, $pwdRepeat) !== false) {
            header("location: ../pages/signup.php?error=passwordsdontmatch");
            exit(); // zorgt ervoor dat de code stopt.
        }
        // kijkt of de gebruikersnaam al bestaat
        if (uidExists($conn, $username) !== false) {
            header("location: ../pages/signup.php?error=usernametaken");
            exit(); // zorgt ervoor dat de code stopt.
        }
    }
    else{
        header("location: ../pages/signup.php");
        exit(); // zorgt ervoor dat de code stopt.
    }

