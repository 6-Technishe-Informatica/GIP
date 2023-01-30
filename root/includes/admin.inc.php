<?php

    // kijkt of de admin.inc.php pagina word aangesproken door de registreer knop en niet gewoon door een url.
    if (isset($_POST["submit-text"])) {

        // echo "it works"; 
        // neemt de data van de admin.php pagina via de POST methode en zet het in een variabele
        $text = $_POST["text"];

        // zorgt ervoor dat de code uit de andere pagina's kan gebruikt worden door de code hier in te laden.
        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';


        // kijkt na of het input veld niet leeg is.
        if (emptyInput($text) !== false) {
            header("location: ../pages/admin.php?error=emptyinput"); // toont de error code in de url
            exit(); // zorgt ervoor dat de code stopt.
        }

        editText($conn2, $text);
    }
    if(isset($_POST["artikelSubmit"])){

        // haalt data uit admin.php en zet deze in een variabele via de post methode
        $artikelNaam = $_POST["naam"];
        $prijs = $_POST["prijs"];
        $promotieprijs = $_POST["promotiePrijs"];
        $beschrijving = $_POST["beschrijving"];
        $vooraad = $_POST["vooraad"];
        $merk = $_POST["brand"];
        $specialDeal = $_POST["specialDeals"];
        $discover = $_POST["discover"];

        // zorgt ervoor dat de code uit de andere pagina's kan gebruikt worden door de code hier in te laden.
        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        // kijkt na of het input veld niet leeg is.
        if (emptyInputArtikel($artikelnaam, $beschrijving, $prijs, $promotieprijs, $vooraad, $merk, $specialDeal, $discover) !== false) {
            header("location: ../pages/admin.php?error=emptyinputartikel"); // toont de error code in de url
            exit(); // zorgt ervoor dat de code stopt.
        }

        createProduct($conn2, $artikelnaam, $beschrijving, $prijs, $promotieprijs, $vooraad, $merk, $specialDeal, $discover);
    }
    else{
        header("location: ../pages/admin.php"); // toont de error code in de url
        exit(); // zorgt ervoor dat de code stopt.
    }