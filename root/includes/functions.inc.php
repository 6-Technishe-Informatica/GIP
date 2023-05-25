<?php
// functie dat kijkt of de input fields ingevuld zijn.
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat)
{
    $result = null; // gaat true or false terug geven
    // empty kijkt na of de variabele leeg is, als de variabele leeg is dan is de resultaat true.
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
        $result = true; // geeft true terug wat zegt dat er een variabele leeg is.
    } else {
        $result = false; // geeft false terug wat zegt dat er geen variabele leeg is.
    }
    return $result; // geeft het resultaat terug.
}
// functie dat kijkt of de gebruikersnaam de juiste character bevat.
function invalidUid($username)
{
    $result = null; // gaat true or false terug geven
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) { // !preg_match kijkt na of de gebruikersnaam alleen letters en cijfers bevat.
        $result = true; // geeft true terug wat zegt dat de gebruikersnaam niet de juiste character bevat.
    } else {
        $result = false; // geeft false terug wat zegt dat de gebruikersnaam de juiste character bevat.
    }
    return $result; // geeft het resultaat terug.
}
// functie dat kijkt of de email een geldig email adres is.
function invalidEmail($email)
{
    $result = null; // gaat true or false terug geven
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // !filter_var kijkt na of de email een geldig email adres is, FILTER_VALIDATE_EMAIL is een standaard functie van php dat de email nakijkt.
        $result = true; // geeft true terug wat zegt dat de email niet geldig is.
    } else {
        $result = false; // geeft false terug wat zegt dat de email geldig is.
    }
    return $result; // geeft het resultaat terug.
}
// functie dat kijkt of de wachtwoorden overeen komen.
function pwdMatch($pwd, $pwdRepeat)
{
    $result = null; // gaat true or false terug geven
    // kijkt na of de wachtwoorden overeen komen.
    if ($pwd !== $pwdRepeat) { // !== kijkt na of de wachtwoorden niet overeen komen.
        $result = true; // geeft true terug wat zegt dat de wachtwoorden niet overeen komen.
    } else {
        $result = false; // geeft false terug wat zegt dat de wachtwoorden overeen komen.
    }
    return $result; // geeft het resultaat terug.
}

// kijkt na of de gebruikersnaam en email al bestaat en geeft een error terug. 
// de true statement word gebruikt in de login.inc.php
function uidExists($conn, $username, $email)
{
    // stmt = statement
    // $sql is een variabele die de sql statement bevat, deze kijkt na of de gebruikersnaam of email al bestaat in de database
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn); // maakt een statement aan
    if (!mysqli_stmt_prepare($stmt, $sql)) { // kijkt na of de statement goed is voorbereid, zoniet de foutcod hieronder als resultaat.
        header("location: ../pages/signup.php?error=stmtfailed"); // stuurt de gebruiker terug naar de signup pagina met een error.
        exit(); // zorgt ervoor dat de code stopt.
    }
    // koppelt de ? in de sql statement aan de variabelen hieronder.
    // "ss" = string string, de eerste string is de gebruikersnaam en de tweede string is de email.
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt); // voert de statement uit.

    $resultData = mysqli_stmt_get_result($stmt); // haalt de resultaten op uit de database.

    if ($row = mysqli_fetch_assoc($resultData)) { // kijkt na of er een resultaat is en zet deze in $row.
        return $row; // geeft de resultaten terug, de true statement word gebruikt in de login.inc.php
    } else {
        $result = false; // geeft false terug als er geen resultaat is.
        return $result; // geeft het resultaat terug.
    }

    mysqli_stmt_close($stmt); // sluit de statement.
}

// maakt de gebruiker aan in de database
function createUser($conn, $name, $email, $username, $pwd, $admin)
{
    // stmt = statement
    // $sql is een variabele die de sql statement bevat, deze maakt de gebruiker aan in de database
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd, admin) VALUES (?, ?, ?, ?, ?);"; // ? is een placeholder voor de variabelen hieronder.
    $stmt = mysqli_stmt_init($conn); // maakt een statement aan
    if (!mysqli_stmt_prepare($stmt, $sql)) { // kijkt of de statement mogelijk is.
        header("location: ../pages/signup.php?error=stmtfailed"); // stuurt de gebruiker terug naar de signup pagina met een error.
        exit(); // zorgt ervoor dat de code stopt.
    }
    $salt = '$6$rounds=5000$gipmanuenquinten$'; // $salt is de variabele die de salt bevat voor het hashen van het wachtwoord.

    $hashedPwd = crypt($pwd, $salt); // $hashedPwd is de variabele die de hashed wachtwoord bevat.

    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $username, $hashedPwd, $admin); // koppelt de ? in de sql statement aan de variabelen hieronder.
    mysqli_stmt_execute($stmt); // voert de statement uit.
    mysqli_stmt_close($stmt); // sluit de statement.

    // stuurt de gebruiker terug naar de signup pagina met een error = none.

    if ($admin == 1) {
        header("location: ../pages/admin.php?error=none");
        exit(); // zorgt ervoor dat de code stopt.
    } else {
        header("location: ../pages/login.php?error=none");;
        exit(); // zorgt ervoor dat de code stopt.
    }
    exit(); // zorgt ervoor dat de code stopt.
}

// kijkt na of de input fields ingevuld zijn.
function emptyInputLogin($username, $pwd)
{
    $result = null; // gaat true or false terug geven

    if (empty($username) || empty($pwd)) { // kijkt na of de input fields leeg zijn.
        $result = true; // geeft true terug als de input fields leeg zijn.
    } else {
        $result = false; // geeft false terug als de input fields niet leeg zijn.
    }
    return $result; // geeft het resultaat terug.
}

// functie die de gebruiker inlogt
function loginUser($conn, $username, $pwd)
{
    // maakt gebruik van de register uidExists functie
    $uidExists = uidExists($conn, $username, $username); // kijkt na of de gebruikersnaam of email bestaat in de database
    if ($uidExists === false) { // kijkt na of de gebruikersnaam of email bestaat in de database? zoniet stuurt hij de gebruiker terug naar de login pagina met een error.
        header("location: ../pages/login.php?error=wronglogin"); // stuurt de gebruiker terug naar de login pagina met een error.
        exit(); // zorgt ervoor dat de code stopt.
    }

    // haalt het wachtwoord op uit de database
    $pwdHashed = $uidExists["usersPwd"];

    if (crypt($pwd, $pwdHashed)) { // kijkt na of de hashes overeen komen, zoniet stuurt hij de gebruiker terug naar de login pagina met een error.  
        echo "loginUser";

        session_start(); // start een sessie
        $_SESSION["userid"] = $uidExists["usersId"]; // zet de gebruikersId in de sessie
        $_SESSION["useruid"] = $uidExists["usersUid"]; // zet de gebruikersUid in de sessie
        $_SESSION["admin"] = $uidExists["admin"]; // zet de gebruikersName in de sessie

        if ($_SESSION["admin"] == 1) { // kijkt na of de gebruiker admin is? zoja stuurt hij de gebruiker naar de admin pagina.
            header("location: ../pages/admin.php");
            exit();
        } else {
            header("location: ../index.php"); // stuurt de gebruiker naar de index pagina.
            exit(); // zorgt ervoor dat de code stopt. 
        }
    } else { // kijkt na of de hashes overeen komen? zoja stuurt hij de gebruiker naar de index pagina.
        header("location: ../pages/login.php?error=wronglogin"); // stuurt de gebruiker terug naar de login pagina met een error.
        exit(); // zorgt ervoor dat de code stopt.
    }
}

function emptyInput($text) // kijkt na of de input fields leeg zijn.
{
    $result = null; // gaat true or false terug geven
    // empty kijkt na of de variabele leeg is, als de variabele leeg is dan is de resultaat true.
    if (empty($text)) {
        $result = true; // geeft true terug wat zegt dat er een variabele leeg is.
    } else {
        $result = false; // geeft false terug wat zegt dat er geen variabele leeg is.
    }
    return $result; // geeft het resultaat terug.
}

function emptyInputArtikel($artikelnaam, $beschrijving, $prijs, $promotieprijs, $vooraad, $merk, $specialDeal, $discover)
{
    $result = null; // gaat true or false terug geven
    // empty kijkt na of de variabele leeg is, als de variabele leeg is dan is de resultaat true.
    if (empty($artikelnaam) || empty($beschrijving) || empty($teprijsxt) || empty($promotieprijs) || empty($vooraad) || empty($merk) || empty($specialDeal) || empty($discover)) {
        $result = true; // geeft true terug wat zegt dat er een variabele leeg is.
    } else {
        $result = false; // geeft false terug wat zegt dat er geen variabele leeg is.
    }
    return $result; // geeft het resultaat terug.
}

function editText($conn2, $text)
{
    // stmt = statement
    // $sql is een variabele die de sql statement bevat, deze maakt de gebruiker aan in de database
    $sql = "UPDATE admintext SET frontpage = '" . $text . "';"; // ? is een placeholder voor de variabelen hieronder.
    $stmt = mysqli_stmt_init($conn2); // maakt een statement aan
    if (!mysqli_stmt_prepare($stmt, $sql)) { // kijkt of de statement mogelijk is.
        header("location: ../pages/admin.php?error=stmtfailed"); // stuurt de gebruiker terug naar de signup pagina met een error.
        exit(); // zorgt ervoor dat de code stopt.
    }
    mysqli_stmt_execute($stmt); // voert de statement uit.
    mysqli_stmt_close($stmt); // sluit de statement.
    header("location: ../pages/admin.php?error=none"); // stuurt de gebruiker terug naar de signup pagina met een error = none.
    exit(); // zorgt ervoor dat de code stopt.
}


// voegt een artikel toe in de database
function createProduct($conn2, $artikelNaam, $beschrijving, $prijs, $promotieprijs, $vooraad, $merk, $specialDeal, $discover)
{
    // stmt = statement
    // $sql is een variabele die de sql statement bevat, voegt een artikel toe in de database
    $sql = "INSERT INTO artikelen (artikelNaam, artikelBeschrijving, brand, prijs, prijsNieuw, beschikbaarheid, specialDeal, discover) VALUES (?, ?, ?, ?, ?, ?, ?, ?);"; // ? is een placeholder voor de variabelen hieronder.
    $stmt = mysqli_stmt_init($conn2); // maakt een statement aan
    if (!mysqli_stmt_prepare($stmt, $sql)) { // kijkt of de statement mogelijk is.
        header("location: ../pages/admin.php?error=stmtfailed"); // stuurt de gebruiker terug naar de signup pagina met een error.
        exit(); // zorgt ervoor dat de code stopt.
    }

    mysqli_stmt_bind_param($stmt, "ssssssss", $artikelNaam, $beschrijving, $merk, $prijs, $promotieprijs, $vooraad,  $specialDeal, $discover); // koppelt de ? in de sql statement aan de variabelen hieronder.
    mysqli_stmt_execute($stmt); // voert de statement uit.
    mysqli_stmt_close($stmt); // sluit de statement.
    $id = mysqli_insert_id($conn2); // haalt de laatste id op uit de database.

    return $id;
}

function addSpecs($conn2, $id, $categorie, $val1, $val2, $val3, $val4, $val5)
{

    $sql = "INSERT INTO specificaties (referentieNummer, soort, val1, val2, val3, val4, val5) VALUES (?, ?, ?, ?, ?, ?, ?);"; // ? is een placeholder voor de variabelen hieronder.

    // stmt = statement
    $stmt = mysqli_stmt_init($conn2); // maakt een statement aan
    if (!mysqli_stmt_prepare($stmt, $sql)) { // kijkt of de statement mogelijk is.
        header("location: ../pages/admin.php?error=stmtfailed"); // stuurt de gebruiker terug naar de signup pagina met een error.
        exit(); // zorgt ervoor dat de code stopt.
    }

    mysqli_stmt_bind_param($stmt, "sssssss", $id, $categorie, $val1, $val2, $val3, $val4, $val5); // koppelt de ? in de sql statement aan de variabelen hieronder.
    mysqli_stmt_execute($stmt); // voert de statement uit.
    mysqli_stmt_close($stmt); // sluit de statement.

    header("location: ../pages/admin.php?error=none"); // stuurt de gebruiker terug naar de signup pagina met een error = none.
}

function reArrayFiles($file) // zorgt ervoor dat de files in een array kunnen worden opgeslagen.
{
    $file_ary = array(); // maakt een array aan
    $file_count = count($file['name']); // telt het aantal files
    $file_key = array_keys($file); // haalt de keys op uit de files

    for ($i = 0; $i < $file_count; $i++) { // loopt door de files heen
        foreach ($file_key as $val) { // loopt door de keys heen
            $file_ary[$i][$val] = $file[$val][$i]; // zet de files in de array
        }
    }
    return $file_ary; // geeft de array terug
}

function addToShoppingCard($conn2, $referentieNummer) // voegt een artikel toe aan de shoppingcard
{
    if (isset($_SESSION['userid'])) {
        $referentieNummer = $_GET['referentieNummer'];
        $klantNummer = $_SESSION['userid'];

        $sql1 = "SELECT * FROM winkelwagen WHERE klantNummer = $klantNummer AND referentieNummer = $referentieNummer;";

        //check if the product is already in the shoppingcard
        $result = mysqli_query($conn2, $sql1);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            $sql = "UPDATE winkelwagen SET aantal = aantal + 1 WHERE klantNummer = $klantNummer AND referentieNummer = $referentieNummer;";
            $query_run = mysqli_query($conn2, $sql);
        }else{
            $sql = "INSERT INTO winkelwagen (klantNummer, referentieNummer) VALUES (?, ?);";
            $stmt = mysqli_stmt_init($conn2); // maakt een statement aan
            mysqli_stmt_prepare($stmt, $sql); // bereid een statement voor

            mysqli_stmt_bind_param($stmt, "ss", $_SESSION['userid'], $referentieNummer); // koppelt de ? in de sql statement aan de variabelen hieronder.
            mysqli_stmt_execute($stmt); // voert de statement uit.
            mysqli_stmt_close($stmt); // sluit de statement.
        }   
    } else {
        echo "<p class='error'>U moet ingelogd zijn om een product te kunnen kopen.</p>";
    }
}

function showShoppingCard($conn2) // laat de shoppingcard zien
{
    if (isset($_SESSION['userid'])) { // kijkt of de gebruiker is ingelogd
        $result = mysqli_query($conn2, "SELECT * FROM winkelwagen WHERE klantNummer = " . $_SESSION['userid'] . ";");  // haalt de winkelwagen op van de gebruiker

        $totaalPrijs = 0; 

        //check if there are any records
        if (mysqli_num_rows($result) > 0) { // kijkt of er artikelen in de winkelwagen zitten
            while ($row = mysqli_fetch_array($result)) {
                $result2 = mysqli_query($conn2, "SELECT * FROM artikelen WHERE referentieNummer = " . $row['referentieNummer'] . ";"); // haalt de artikelen op uit de database
                while ($row2 = mysqli_fetch_array($result2)) { // loopt door de artikelen heen
                    echo "<div class='product'>"; 
                    echo '<img src="../images/productImages/' . $row['referentieNummer'] . '_1.webp' . '" alt="productPicture">';
                    echo "<h3 class='product-name'>" . $row2['artikelNaam'] . "</h3>";
    
                    if ($row2['prijsNieuw'] != "") { // kijkt of er een promotieprijs is
                        echo "<p class='product-price'>€" . $row2['prijsNieuw'] . "</p>";  // laat de promotieprijs zien
                        $totaalPrijs += $row2['prijsNieuw']; // telt de prijs op bij de totaalprijs
                    } else { // als er geen promotieprijs is
                        echo "<p class='product-price'>€" . $row2['prijs'] . "</p>"; // laat de normale prijs zien
                        $totaalPrijs += $row2['prijs']; // telt de prijs op bij de totaalprijs
                    } 

                    echo "<p class='aantal'>Aantal: " . $row['aantal'] . "</p>"; // laat het aantal zien

                    echo "<a href='../includes/shoppingCard.inc.php?referentieNummer=" . $row['referentieNummer'] . "&klantNummer=" . $_SESSION['userid'] . "'>Verwijderen</a>"; // verwijdert het artikel uit de winkelwagen
                    echo "</div>";
                }
            }

            return $totaalPrijs; // geeft de totaalprijs terug
        } else {
            echo "<p class='error'>Uw winkelwagen is leeg.</p>"; // laat een error zien als de winkelwagen leeg is
        }

    } else {
        echo "<p class='error'>Log u in om uw winkelwagen te kunnen bekijken.</p>"; // laat een error zien als de gebruiker niet is ingelogd
    }
}

function clearShoppingcard($conn2, $klantNummer) // verwijdert alle artikelen uit de winkelwagen
{
    $sql = "DELETE FROM winkelwagen WHERE klantNummer = $klantNummer"; // verwijdert alle artikelen uit de winkelwagen
    mysqli_query($conn2, $sql); // voert de query uit
}

// -------------------- PROFILE PAGE -------------------------

// vervangt de gerbuikersnaam van in de database met de nieuwe gebruikersnaam

function update_name($conn, $name, $usersId) // update de naam van de gebruiker
{

    $query = "UPDATE users SET usersName = '$name' WHERE usersId = '$usersId'"; // update de naam van de gebruiker
    $query_run = mysqli_query($conn, $query); // voert de query uit

    if ($query_run) { // kijkt of de query is uitgevoerd
        header("location: ../pages/profile.php?error=data-saved"); // laat een melding zien als de query is uitgevoerd
    } else {
        header("location: ../pages/profile.php?error=data-not-saved"); // laat een error zien als de query niet is uitgevoerd
    }
}

function update_username($conn, $usersUid, $usersId) // update de gebruikersnaam van de gebruiker
{

    $query = "UPDATE users SET usersUid = '$usersUid' WHERE usersId = '$usersId'"; // update de gebruikersnaam van de gebruiker
    $query_run = mysqli_query($conn, $query); // voert de query uit

    if ($query_run) { // kijkt of de query is uitgevoerd
        header("location: ../pages/profile.php?error=data-saved"); // laat een melding zien als de query is uitgevoerd
    } else {
        header("location: ../pages/profile.php?error=data-not-saved"); // laat een error zien als de query niet is uitgevoerd
    }
}

function update_email($conn, $usersUid, $usersId) // update de email van de gebruiker
{

    $query = "UPDATE users SET usersEmail = '$usersUid' WHERE usersId = '$usersId'"; // update de email van de gebruiker
    $query_run = mysqli_query($conn, $query); // voert de query uit

    if ($query_run) { // kijkt of de query is uitgevoerd 
        header("location: ../pages/profile.php?error=data-saved"); // laat een melding zien als de query is uitgevoerd
    } else {
        header("location: ../pages/profile.php?error=data-not-saved"); // laat een error zien als de query niet is uitgevoerd
    }
}

function update_password($conn, $pwd, $usersPwd_repeat, $newPwd, $usersId) // update het wachtwoord van de gebruiker
{


    // check if the $pwd and $usersPwd_repeat are the same
    if ($pwd == $usersPwd_repeat) {

        $salt = '$6$rounds=5000$gipmanuenquinten$'; // $salt is de variabele die de salt bevat voor het hashen van het wachtwoord.

        $hashedPwd = crypt($pwd, $salt); // $hashedPwd is de variabele die de hashed wachtwoord bevat.

        // get pwd from database
        $query = "SELECT usersPwd FROM users WHERE usersId = '$usersId'";
        $query_run = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($query_run);
        $pwdFromDatabase = $row['usersPwd'];

        // check if the $pwd and $pwdFromDatabase are the same
        if ($hashedPwd == $pwdFromDatabase) {

            $newPwd = crypt($newPwd, $salt); // $hashedPwd is de variabele die de hashed wachtwoord bevat.s

            $query = "UPDATE users SET usersPwd = '$newPwd' WHERE usersId = '$usersId'"; // update het wachtwoord van de gebruiker
            $query_run = mysqli_query($conn, $query);

            if ($query_run) { // kijkt of de query is uitgevoerd
                header("location: ../pages/profile.php?error=data-saved");
            } else {
                header("location: ../pages/profile.php?error=data-not-saved");
            }
        }
    } else {
        header("location: ../pages/profile.php?error=passwords-dont-match"); // laat een error zien als de wachtwoorden niet overeenkomen
        exit();
    }
}