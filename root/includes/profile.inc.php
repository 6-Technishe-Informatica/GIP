<?php

    session_start(); // start de sessie
    
    // kijkt of de signup.inc.php pagina word aangesproken door de registreer knop en niet gewoon door een url.
    if (isset($_POST["submit-naam"])) {

        // neemt de data van de signup.php pagina via de POST methode en zet het in een variabele

        $name = $_POST["name"];
        $usersId = $_SESSION["userid"];

        // zorgt ervoor dat de code uit de andere pagina's kan gebruikt worden door de code hier in te laden.
        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        // past de informatie aan
        update_name($conn, $name, $usersId);
    }
    elseif(isset($_POST["submit-gebruikersnaam"])){

        $usersUid = $_POST["usersUid"];
        $usersId = $_SESSION["userid"];

        // zorgt ervoor dat de code uit de andere pagina's kan gebruikt worden door de code hier in te laden.
        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        // past de informatie aan
        update_username($conn, $usersUid, $usersId);

    }
    elseif(isset($_POST["submit-email"])){

        $usersEmail = $_POST["usersEmail"];
        $usersId = $_SESSION["userid"];

        // zorgt ervoor dat de code uit de andere pagina's kan gebruikt worden door de code hier in te laden.
        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        // past de informatie aan
        update_email($conn, $usersEmail, $usersId);

    }
    elseif(isset($_POST["submit-password"])){

        $pwd = $_POST["usersPwd"];
        $usersPwd_repeat = $_POST["usersPwd-repeat"];
        $newPwd = $_POST["usersNewPwd"];
        $usersId = $_SESSION["userid"];

        // zorgt ervoor dat de code uit de andere pagina's kan gebruikt worden door de code hier in te laden.
        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        // past de informatie aan
        update_password($conn, $pwd, $usersPwd_repeat, $newPwd, $usersId);

    } // gaat terug naar de signup.php pagina als de registratie goed is gegaan.
    else{
        header("location: ../pages/profile.php?error=fout-opgelopen"); // toont de error code in de url
        exit(); // zorgt ervoor dat de code stopt.
    }

