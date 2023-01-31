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
if (isset($_POST["artikelSubmit"])) {

    // // haalt data uit admin.php en zet deze in een variabele via de post methode
    $artikelNaam = $_POST["naam"];
    $prijs = $_POST["prijs"];
    $promotieprijs = $_POST["promotiePrijs"];
    $beschrijving = $_POST["beschrijving"];
    $vooraad = $_POST["vooraad"];
    $merk = $_POST["brand"];

    // kijk als post discover en specialDeals bestaan
    if (isset($_POST["specialDeals"])) {
        $specialDeal = 1;
    } else {
        $specialDeal = 0;
    }

    if (isset($_POST["discover"])) {
        $discover = 1;
    } else {
        $discover = 0;
    }

    // //variabelen uit de javascript
    // // CPU
    // $cpucore = $_POST["cpuCores"];
    // $cpuspeed = $_POST["cpuSpeed"];
    // $cpusocket = $_POST["cpuSocket"];
    // $cputype = $_POST["cpuType"];
    // // GPU
    // $gpumemory = $_POST[""];
    // $gpumemorytype = $_POST["gpuMemoryType"];
    // $gputype = $_POST["gpuType"];
    // $gpucores = $_POST["gpuCores"];
    // // RAM
    // $ramtype = $_POST["ramType"];
    // $ramspeed = $_POST["ramSpeed"];
    // $ramsize = $_POST["ramSize"];
    // // PSU
    // $psupower = $_POST["psuPower"];
    // $psumodular = $_POST["psuModular"];
    // // MOBO
    // $mobosocket = $_POST["moboSocket"];
    // $moboformfactor = $_POST["moboFormFactor"];
    // $moboramtype = $_POST["moboRamType"];
    // $moboramslots = $_POST["moboRamSlots"];
    // // STORAGE
    // $storagetype = $_POST["storageType"];
    // $storagesize = $_POST["storageSize"];
    // $storagespeed = $_POST["storageSpeed"];
    // // CASE
    // $caseformfactor = $_POST["caseFormFactor"];
    // $casesize = $_POST["caseSize"];
    // // KEYBOARD
    // $keyboardtype = $_POST["keyboardType"];
    // $keyboardswitch = $_POST["keyboardSwitch"];
    // // MOUSE
    // $mousetype = $_POST["mouseType"];
    // $mousesensor = $_POST["mouseSensor"];
    // // MONITOR
    // $monitorsize = $_POST["monitorSize"];
    // $monitorrefreshrate = $_POST["monitorRefreshRate"];
    // $monitorresolution = $_POST["monitorResolution"];
    // // HEADSET
    // $headphonestype = $_POST["headphonesType"];
    // $headphonesmic = $_POST["headphonesMic"];

    // zorgt ervoor dat de code uit de andere pagina's kan gebruikt worden door de code hier in te laden.
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    // kijkt na of het input veld niet leeg is.
    if (emptyInputArtikel($artikelNaam, $beschrijving, $prijs, $promotieprijs, $vooraad, $merk, $specialDeal, $discover) == false) {
        header("location: ../pages/admin.php?error=emptyinputartikel"); // toont de error code in de url
        exit(); // zorgt ervoor dat de code stopt.
    }

    createProduct($conn2, $artikelNaam, $beschrijving, $prijs, $promotieprijs, $vooraad, $merk, $specialDeal, $discover);
}
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
} else {
    header("location: ../pages/admin.php"); // toont de error code in de url
    exit(); // zorgt ervoor dat de code stopt.
}

//SELECT LAST_INSERT_ID()