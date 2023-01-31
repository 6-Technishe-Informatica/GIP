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

    $categorie = $_POST["categorie"];

    //kijk als de post bestaat
    if (isset($_POST["cpuCores"])) {
        $cpucore = $_POST["cpuCores"];
    } elseif (isset($_POST["cpuSpeed"])) {
        $cpuspeed = $_POST["cpuSpeed"];
    } elseif (isset($_POST["cpuSocket"])) {
        $cpusocket = $_POST["cpuSocket"];
    } elseif (isset($_POST["cpuType"])) {
        $cputype = $_POST["cpuType"];
    } elseif (isset($_POST["gpuType"])) {
        $gputype = $_POST["gpuType"];
    } elseif (isset($_POST["gpuCores"])) {
        $gpucores = $_POST["gpuCores"];
    } elseif (isset($_POST["gpuMemoryType"])) {
        $gpumemorytype = $_POST["gpuMemoryType"];
    } elseif (isset($_POST["gpuMemory"])) {
        $gpumemory = $_POST["gpuMemory"];
    } elseif (isset($_POST["ramType"])) {
        $ramtype = $_POST["ramType"];
    } elseif (isset($_POST["ramSpeed"])) {
        $ramspeed = $_POST["ramSpeed"];
    } elseif (isset($_POST["ramSize"])) {
        $ramsize = $_POST["ramSize"];
    } elseif (isset($_POST["psuPower"])) {
        $psupower = $_POST["psuPower"];
    } elseif (isset($_POST["psuModular"])) {
        $psumodular = $_POST["psuModular"];
    } elseif (isset($_POST["moboSocket"])) {
        $mobosocket = $_POST["moboSocket"];
    } elseif (isset($_POST["moboFormFactor"])) {
        $moboformfactor = $_POST["moboFormFactor"];
    } elseif (isset($_POST["moboRamType"])) {
        $moboramtype = $_POST["moboRamType"];
    } elseif (isset($_POST["moboRamSlots"])) {
        $moboramslots = $_POST["moboRamSlots"];
    } elseif (isset($_POST["storageType"])) {
        $storagetype = $_POST["storageType"];
    } elseif (isset($_POST["storageSize"])) {
        $storagesize = $_POST["storageSize"];
    } elseif (isset($_POST["storageSpeed"])) {
        $storagespeed = $_POST["storageSpeed"];
    } elseif (isset($_POST["caseFormFactor"])) {
        $caseformfactor = $_POST["caseFormFactor"];
    } elseif (isset($_POST["caseSize"])) {
        $casesize = $_POST["caseSize"];
    } elseif (isset($_POST["keyboardType"])) {
        $keyboardtype = $_POST["keyboardType"];
    } elseif (isset($_POST["keyboardSwitch"])) {
        $keyboardswitch = $_POST["keyboardSwitch"];
    } elseif (isset($_POST["mouseType"])) {
        $mousetype = $_POST["mouseType"];
    } elseif (isset($_POST["mouseSensor"])) {
        $mousesensor = $_POST["mouseSensor"];
    } elseif (isset($_POST["monitorSize"])) {
        $monitorsize = $_POST["monitorSize"];
    } elseif (isset($_POST["monitorRefreshRate"])) {
        $monitorrefreshrate = $_POST["monitorRefreshRate"];
    } elseif (isset($_POST["monitorResolution"])) {
        $monitorresolution = $_POST["monitorResolution"];
    } elseif (isset($_POST["headphonesType"])) {
        $headphonestype = $_POST["headphonesType"];
    } elseif (isset($_POST["headphonesMic"])) {
        $headphonesmic = $_POST["headphonesMic"];
    }

    // zorgt ervoor dat de code uit de andere pagina's kan gebruikt worden door de code hier in te laden.
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    // kijkt na of het input veld niet leeg is.
    if (emptyInputArtikel($artikelNaam, $beschrijving, $prijs, $promotieprijs, $vooraad, $merk, $specialDeal, $discover) == false) {
        header("location: ../pages/admin.php?error=emptyinputartikel"); // toont de error code in de url
        exit(); // zorgt ervoor dat de code stopt.
    }

    $id = createProduct($conn2, $artikelNaam, $beschrijving, $prijs, $promotieprijs, $vooraad, $merk, $specialDeal, $discover);

    // kijkt welke categorie het is en voegt de specs toe aan de juiste tabel.
    
    if ($categorie = "cpu"){
        addSpecs($conn2, $categorie, $id, $cpucore, $cpuspeed, $cpusocket, $cputype, 0);
    }elseif ($categorie = "gpu"){
        addSpecs($conn2, $id, $categorie, $gputype, $gpucores, $gpumemorytype, $gpumemory, 0);
    }elseif ($categorie = "ram"){
        addSpecs($conn2, $id, $categorie, $ramtype, $ramspeed, $ramsize, 0, 0);
    }elseif ($categorie = "psu"){
        addSpecs($conn2, $id, $categorie, $psupower, $psumodular, 0, 0, 0);
    }elseif ($categorie = "mobo"){
        addSpecs($conn2, $id, $categorie, $mobosocket, $moboformfactor, $moboramtype, $moboramslots, 0);
    }elseif ($categorie = "storage"){
        addSpecs($conn2, $id, $categorie, $storagetype, $storagesize, $storagespeed, 0, 0);
    }elseif ($categorie = "case"){
        addSpecs($conn2, $id, $categorie, $caseformfactor, $casesize, 0, 0, 0);
    }elseif ($categorie = "keyboard"){
        addSpecs($conn2, $id, $categorie, $keyboardtype, $keyboardswitch, 0, 0, 0);
    }elseif ($categorie = "mouse"){
        addSpecs($conn2, $id, $categorie, $mousetype, $mousesensor, 0, 0, 0);
    }elseif ($categorie = "monitor"){
        addSpecs($conn2, $id, $categorie, $monitorsize, $monitorrefreshrate, $monitorresolution, 0, 0);
    }elseif ($categorie = "headphones"){
        addSpecs($conn2, $id, $categorie, $headphonestype, $headphonesmic, 0, 0, 0);
    }
    
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
}

//SELECT LAST_INSERT_ID()