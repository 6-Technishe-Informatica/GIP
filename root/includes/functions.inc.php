<?php

    // functie dat kijkt of de input fields ingevuld zijn.
    function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat){
        $result; // gaat true or false terug geven
        // empty kijkt na of de variabele leeg is, als de variabele leeg is dan is de resultaat true.
        if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
            $result = true; // geeft true terug wat zegt dat er een variabele leeg is.
        }
        else{
            $result = false; // geeft false terug wat zegt dat er geen variabele leeg is.
        }
        return $result; // geeft het resultaat terug.
    }
    // functie dat kijkt of de gebruikersnaam de juiste character bevat.
    function invalidUid($username){
        $result; // gaat true or false terug geven
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) { // !preg_match kijkt na of de gebruikersnaam alleen letters en cijfers bevat.
            $result = true; // geeft true terug wat zegt dat de gebruikersnaam niet de juiste character bevat.
        }
        else{
            $result = false; // geeft false terug wat zegt dat de gebruikersnaam de juiste character bevat.
        }
        return $result; // geeft het resultaat terug.
    }
    // functie dat kijkt of de email een geldig email adres is.
    function invalidEmail($email){
        $result; // gaat true or false terug geven
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // !filter_var kijkt na of de email een geldig email adres is, FILTER_VALIDATE_EMAIL is een standaard functie van php dat de email nakijkt.
            $result = true; // geeft true terug wat zegt dat de email niet geldig is.
        }
        else{
            $result = false; // geeft false terug wat zegt dat de email geldig is.
        }
        return $result; // geeft het resultaat terug.
    }
    // functie dat kijkt of de wachtwoorden overeen komen.
    function pwdMatch($pwd, $pwdRepeat){
        $result; // gaat true or false terug geven
        // kijkt na of de wachtwoorden overeen komen.
        if ($pwd !== $pwdRepeat) { // !== kijkt na of de wachtwoorden niet overeen komen.
            $result = true; // geeft true terug wat zegt dat de wachtwoorden niet overeen komen.
        }
        else{
            $result = false; // geeft false terug wat zegt dat de wachtwoorden overeen komen.
        }
        return $result; // geeft het resultaat terug.
    }

    // kijkt na of de gebruikersnaam en email al bestaat en geeft een error terug. 
    // de true statement word gebruikt in de login.inc.php
    function uidExists($conn, $username, $email){
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

        if($row = mysqli_fetch_assoc($resultData)){ // kijkt na of er een resultaat is en zet deze in $row.
            return $row; // geeft de resultaten terug, de true statement word gebruikt in de login.inc.php
        }
        else{
            $result = false; // geeft false terug als er geen resultaat is.
            return $result; // geeft het resultaat terug.
        }

        mysqli_stmt_close($stmt); // sluit de statement.
    }

    // maakt de gebruiker aan in de database
    function createUser($conn, $name, $email, $username, $pwd){
        // stmt = statement
        // $sql is een variabele die de sql statement bevat, deze maakt de gebruiker aan in de database
        $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);"; // ? is een placeholder voor de variabelen hieronder.
        $stmt = mysqli_stmt_init($conn); // maakt een statement aan
        if (!mysqli_stmt_prepare($stmt, $sql)) { // kijkt of de statement mogelijk is.
            header("location: ../pages/signup.php?error=stmtfailed"); // stuurt de gebruiker terug naar de signup pagina met een error.
            exit(); // zorgt ervoor dat de code stopt.
        }

        // hashing werkt nog niet, eens dit wel werkt verander de $pwd naar $hashedPwd op derde lijn hier onder
        // $pwd is de wachtwoord variabele die hierboven word meegegeven, PASSWORD_DEFAULT is een standaard functie van php die het wachtwoord hash version 5.5, in 5.2 werkt crypt.
        $hashedPwd = crypt($pwd); 
        
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd); // koppelt de ? in de sql statement aan de variabelen hieronder.
        mysqli_stmt_execute($stmt); // voert de statement uit.
        mysqli_stmt_close($stmt); // sluit de statement.
        header("location: ../pages/login.php?error=none"); // stuurt de gebruiker terug naar de signup pagina met een error = none.
        exit(); // zorgt ervoor dat de code stopt.
    }

    // kijkt na of de input fields ingevuld zijn.
    function emptyInputLogin($username, $pwd){
        $result; // gaat true or false terug geven

        if (empty($username) || empty($pwd)) { // kijkt na of de input fields leeg zijn.
            $result = true; // geeft true terug als de input fields leeg zijn.
        }
        else{
            $result = false; // geeft false terug als de input fields niet leeg zijn.
        }
        return $result; // geeft het resultaat terug.
    }

    // functie die de gebruiker inlogt
    function loginUser($conn, $username, $pwd){
        // maakt gebruik van de register uidExists functie
        $uidExists = uidExists($conn, $username, $username); // kijkt na of de gebruikersnaam of email bestaat in de database
        if ($uidExists === false) { // kijkt na of de gebruikersnaam of email bestaat in de database? zoniet stuurt hij de gebruiker terug naar de login pagina met een error.
            header("location: ../pages/login.php?error=wronglogin"); // stuurt de gebruiker terug naar de login pagina met een error.
            exit(); // zorgt ervoor dat de code stopt.
        }

        // haalt het wachtwoord op uit de database
        $pwdHashed = $uidExists["usersPwd"]; 
        // kijkt of de hashes overeen komen, werkt niet dus de pwdHashed moet nadien chechPwd worden in de if statement hier onder.
        // $checkPwd = password_verify($pwd, $pwdHashed);

        if (crypt($pwd, $pwdHashed)) { // kijkt na of de hashes overeen komen, zoniet stuurt hij de gebruiker terug naar de login pagina met een error.  
            echo "loginUser";

            session_start(); // start een sessie
            $_SESSION["userid"] = $uidExists["usersId"]; // zet de gebruikersId in de sessie
            $_SESSION["useruid"] = $uidExists["usersUid"]; // zet de gebruikersUid in de sessie

            if ($username === "Manu" || $username = "Quinten"){
                header("location: ../pages/admin.php");
                exit();
            }
            else{
                header("location: ../index.php"); // stuurt de gebruiker naar de index pagina.
                exit(); // zorgt ervoor dat de code stopt. 
            }
        }
        else { // kijkt na of de hashes overeen komen? zoja stuurt hij de gebruiker naar de index pagina.
            header("location: ../pages/login.php?error=wronglogin"); // stuurt de gebruiker terug naar de login pagina met een error.
            exit(); // zorgt ervoor dat de code stopt.
        }
    }
