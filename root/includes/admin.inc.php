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

    //$categorie = $_POST["categorie"];

    $cpucore = 0;
    $cpuspeed = 0;
    $cpusocket = 0;
    $cputype = 0;
    $gpumemory = 0;
    $gpumemorytype = 0;
    $gputype = 0;
    $gpucores = 0;
    $ramtype = 0;
    $ramspeed = 0;
    $ramsize = 0;
    $psupower = 0;
    $psumodular = 0;
    $mobosocket = 0;
    $moboformfactor = 0;
    $moboramtype = 0;
    $moboramslots = 0;
    $storagetype = 0;
    $storagesize = 0;
    $storagespeed = 0;
    $caseformfactor = 0;
    $casesize = 0;
    $keyboardtype = 0;
    $keyboardswitch = 0;
    $mousetype = 0;
    $mousesensor = 0;
    $monitorsize = 0;
    $monitorrefreshrate = 0;
    $monitorresolution = 0;
    $headphonestype = 0;
    $headphonesmic = 0;

    // zorgt ervoor dat de code uit de andere pagina's kan gebruikt worden door de code hier in te laden.
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    // kijkt na of het input veld niet leeg is.
    if (emptyInputArtikel($artikelNaam, $beschrijving, $prijs, $promotieprijs, $vooraad, $merk, $specialDeal, $discover) == false) {
        header("location: ../pages/admin.php?error=emptyinputartikel"); // toont de error code in de url
        exit(); // zorgt ervoor dat de code stopt.
    }

    $id = createProduct($conn2, $artikelNaam, $beschrijving, $prijs, $promotieprijs, $vooraad, $merk, $specialDeal, $discover); // voegt de product toe aan de database en geeft de id terug.

    $img = $_FILES['img']; // haalt de afbeelding op via de post methode

    if (!empty($img)) { // kijkt of er een afbeelding is geupload
        $img_desc = reArrayFiles($img); // zet de afbeelding om naar een array
        $teller = 0; // zorgt ervoor dat de afbeeldingen een unieke naam krijgen

        foreach ($img_desc as $val) { // loopt door de array heen en zet de afbeeldingen in de map
            $teller++;
            $newname = $id . "_" . $teller . '.webp'; // maakt een unieke naam voor de afbeelding
            move_uploaded_file($val['tmp_name'], '../images/productImages/' . $newname); // zet de afbeelding in de map
        }
    }
    // kijkt welke categorie het is en voegt de specs toe aan de juiste tabel.

    if ($categorie = "cpu") {
        $cpucore = $_POST["cpuCores"];
        $cpuspeed = $_POST["cpuSpeed"];
        $cpusocket = $_POST["cpuSocket"];
        $cputype = $_POST["cpuType"];

        addSpecs($conn2, $id, $categorie, $cpucore, $cpuspeed, $cpusocket, $cputype, 0);
    }
    if ($categorie = "gpu") {
        $gputype = $_POST["gpuType"];
        $gpucores = $_POST["gpuCores"];
        $gpumemorytype = $_POST["gpuMemoryType"];
        $gpumemory = $_POST["gpuMemory"];

        addSpecs($conn2, $id, $categorie, $gputype, $gpucores, $gpumemorytype, $gpumemory, 0);
    }
    if ($categorie = "ram") {
        $ramtype = $_POST["ramType"];
        $ramspeed = $_POST["ramSpeed"];
        $ramsize = $_POST["ramSize"];

        addSpecs($conn2, $id, $categorie, $ramtype, $ramspeed, $ramsize, 0, 0);
    }
    if ($categorie = "psu") {
        $psupower = $_POST["psuPower"];
        $psumodular = $_POST["psuModular"];

        addSpecs($conn2, $id, $categorie, $psupower, $psumodular, 0, 0, 0);
    }
    if ($categorie = "mobo") {
        $mobosocket = $_POST["moboSocket"];
        $moboformfactor = $_POST["moboFormFactor"];
        $moboramtype = $_POST["moboRamType"];
        $moboramslots = $_POST["moboRamSlots"];

        addSpecs($conn2, $id, $categorie, $mobosocket, $moboformfactor, $moboramtype, $moboramslots, 0);
    }
    if ($categorie = "storage") {
        $storagetype = $_POST["storageType"];
        $storagesize = $_POST["storageSize"];
        $storagespeed = $_POST["storageSpeed"];

        addSpecs($conn2, $id, $categorie, $storagetype, $storagesize, $storagespeed, 0, 0);
    }
    if ($categorie = "case") {
        $caseformfactor = $_POST["caseFormFactor"];
        $casesize = $_POST["caseSize"];

        addSpecs($conn2, $id, $categorie, $caseformfactor, $casesize, 0, 0, 0);
    }
    if ($categorie = "keyboard") {
        $keyboardtype = $_POST["keyboardType"];
        $keyboardswitch = $_POST["keyboardSwitch"];

        addSpecs($conn2, $id, $categorie, $keyboardtype, $keyboardswitch, 0, 0, 0);
    }
    if ($categorie = "mouse") {
        $mousetype = $_POST["mouseType"];
        $mousesensor = $_POST["mouseSensor"];

        addSpecs($conn2, $id, $categorie, $mousetype, $mousesensor, 0, 0, 0);
    }
    if ($categorie = "monitor") {
        $monitorsize = $_POST["monitorSize"];
        $monitorrefreshrate = $_POST["monitorRefreshRate"];
        $monitorresolution = $_POST["monitorResolution"];

        addSpecs($conn2, $id, $categorie, $monitorsize, $monitorrefreshrate, $monitorresolution, 0, 0);
    }
    if ($categorie = "headphones") {
        $headphonestype = $_POST["headphonesType"];
        $headphonesmic = $_POST["headphonesMic"];

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

    createUser($conn, $name, $email, $username, $password, 1); // maakt de gebruiker aan
}
if (isset($_POST["aanpassen"])) {
    $artikelNaam = $_POST["artikelNaam"];

    require_once 'dbh.inc.php';

    //laat de gegevens zien van het artikel in een form

    echo "<!DOCTYPE html>
    <html lang='nl'>
    
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='../style/index.css'>
        <title>Tech point</title>
    </head>
    
    <body id='admin'>
        <main>";

    echo "<h1>Artikel aanpassen</h1>";
    echo $artikelNaam;

    $sql = "SELECT * FROM artikelen WHERE artikelNaam = '$artikelNaam'";
    $result = mysqli_query($conn2, $sql);

    //checkt of er een resultaat is
    if (mysqli_num_rows($result) > 0) {
        // output data of each row

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='form'><form action='../includes/admin.inc.php' method='post'>
            <label>Artikel naam</label>
            <input type='text' name='artikelNaam' value='" . $row['artikelNaam'] . "'>
            <label>Artikel prijs</label>
            <input type='text' name='artikelPrijs' value='" . $row['prijs'] . "'>
            <label>Artikel voorraad</label>
            <input type='text' name='artikelVoorraad' value='" . $row['beschikbaarheid'] . "'>
            <label>Artikel beschrijving</label>
            <textarea type='text' name='artikelBeschrijving'>" . $row['artikelBeschrijving'] . "</textarea>
            <label>Artikel referentie code</label>
            <input type='text' readonly name='artikelId' value='" . $row['referentieNummer'] . "'>
            <label>Artikel verwijderen </label>
            <input type='checkbox' name='verwijderen'>
            <button type='submit' name='aanpassingen'> Aanpassingen opslaan</button>
            </form></div>";
    }
    echo "</main></body>";
    echo "</html>";

    } else {
        echo "<br><br>" . "Dit artikel betstaat niet";
    }
}
if (isset($_POST["aanpassingen"])) {
    $artikelNaam = $_POST["artikelNaam"];
    $artikelPrijs = $_POST["artikelPrijs"];
    $artikelVoorraad = $_POST["artikelVoorraad"];
    $artikelBeschrijving = $_POST["artikelBeschrijving"];
    $artikelId = $_POST["artikelId"];

    require_once 'dbh.inc.php';

    //update de gegevens van het artikel

    if (isset($_POST["verwijderen"])) {
        $sql = "DELETE FROM artikelen WHERE referentieNummer = '$artikelId'";
        $result = mysqli_query($conn2, $sql);

        echo "<script>window.close();</script>";
    } else {
        $sql = "UPDATE artikelen SET artikelNaam = '$artikelNaam', prijs = '$artikelPrijs', beschikbaarheid = '$artikelVoorraad', artikelBeschrijving = '$artikelBeschrijving' WHERE referentieNummer = '$artikelId'";
        $result = mysqli_query($conn2, $sql);

        echo "<script>window.close();</script>";
    }
}