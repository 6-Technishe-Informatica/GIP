<?php

    // kijkt na of de input fields ingevuld zijn.
    function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat){
        $result;
        if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function invalidUid($username){
        $result;
        // !preg_match kijkt na of de gebruikersnaam alleen letters en cijfers bevat.
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function invalidEmail($email){
        $result;
        // !filter_var kijkt na of de email een geldig email adres is.
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function invalidPassword($pwd, $pwdRepeat){
        $result;
        // kijkt na of de wachtwoorden overeen komen.
        if ($pwd !== $pwdRepeat) {
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    // kijkt na of de gebruikersnaam en email al bestaat en geeft een error terug. 
    // de true statement word gebruikt in de login.inc.php
    function uidExists($conn, $username, $email){
        // stmt = statement
        $sql = "SELECT * FROM gebruikers WHERE gebruikersUid = ? OR gebruikersEmail = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../pages/signup.php?error=stmtfailed");
            exit(); // zorgt ervoor dat de code stopt.
        }
        
        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }
        else{
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    // maakt de gebruiker aan in de database
    function createUser($conn, $name, $email, $username, $pwd){
        // stmt = statement
        $sql = "INSERT INTO gebruikers (gebruikersNaam, gebruikersEmail, gebruikersUid, gebruikersWachtwoord) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        // kijkt of de statement mogelijk is.
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../pages/signup.php?error=stmtfailed");
            exit(); // zorgt ervoor dat de code stopt.
        }

        // hash het wachtwoord
        // hashing werkt nog niet, eens dit wel werkt verander de $pwd naar $hashedPwd op derde lijn hier onder
        // $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $pwd);
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_close($stmt);
        header("location: ../pages/signup.php?error=none");
        exit();
    }

    // kijkt na of de input fields ingevuld zijn.
    function emptyInputLogin($username, $password){
        $result;
        if (empty($username) || empty($pwdRepeat)) {
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function loginUser($conn, $username, $password){
        // maakt gebruik van de register uidExists functie
        $uidExists = uidExists($conn, $username, $username);

        if ($uidExists === false) {
            header("location: ../pages/login.php?error=wronglogin");
            exit();
        }

        // haalt het wachtwoord op uit de database
        $pwdHashed = $uidExists["gebruikersWachtwoord"]; 
        // kijkt of de hashes overeen komen, werkt niet dus de pwdHashed moet nadien chechPwd worden in de if statement hier onder.
        $checkPwd = password_verify($password, $pwdHashed);

        if ($checkPwd === false) {
            header("location: ../pages/login.php?error=wronglogin");
            exit();
        }
        else if ($checkPwd === true) {
            session_start();
            $_SESSION["userid"] = $uidExists["gebruikersId"];
            $_SESSION["useruid"] = $uidExists["gebruikersUid"];
            header("location: ../pages/index.php");
            exit();
        }
    }
