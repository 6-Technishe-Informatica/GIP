<?php
    // kijkt na of de gebruiker op de submit knop heeft gedrukt.
    if(isset($_POST["login-submit"])){ // login-submit is de name van de submit knop in de login.php pagina.
        // neemt de data van de login.php pagina via de POST methode en zet het in een variabele
        $username = $_POST["uid"]; 
        $pwd = $_POST["pwd"];

        // zorgt ervoor dat de code uit de andere pagina's word gebruikt.
        // require_once zorgt ervoor dat de code maar 1 keer word geladen.
        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        // roept code aan uit function.inc.php voor de errorhandlers.
        if(emptyInputLogin($username, $pwd) !== false){ // kijkt of de velden leeg zijn
            header("location: ../pages/login.php?error=emptyinput"); // toont de error code in de url
            exit(); // zorgt ervoor dat de code stopt.

            echo "empty";
        }

        loginUser($conn, $username, $pwd); // roept de functie aan uit de functions.inc.php pagina.
    } // gaat terug naar de login.php pagina als de login goed is gegaan.
    else{
        header("location: ../pages/login.php"); // toont de error code in de url
        exit(); // zorgt ervoor dat de code stopt.
    }