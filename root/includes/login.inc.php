<?php
    // kijkt na of de gebruiker op de submit knop heeft gedrukt.
    if(isset($_POST["submit"])){

        $username = $_POST["uid"];
        $password = $_POST["pwd"];

        // zorgt ervoor dat de code uit de andere pagina's word gebruikt.
        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(emptyInputLogin($username, $password) !== false){
            header("location: ../pages/login.php?error=emptyinput");
            exit();
        }

        loginUser($conn, $username, $password);
    }
    else{
        header("location: ../pages/login.php");
        exit();
    }