<?php
    // logt de gebruiker uit
    session_start(); // start de sessie
    session_unset(); // verwijderd alle sessie variabelen
    session_destroy(); // verwijderd de sessie

    header("location: ../index.php"); // stuurt de gebruiker terug naar de index pagina
    exit(); // zorgt ervoor dat de code stopt.