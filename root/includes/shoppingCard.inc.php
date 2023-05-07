<?php
include 'dbh.inc.php';

$referentieNummer = $_GET['referentieNummer']; // haalt het referentie nummer op
$klantNummer = $_GET['klantNummer']; // haalt het klant nummer op

$sql = "DELETE FROM winkelwagen WHERE referentieNummer = $referentieNummer AND klantNummer = $klantNummer"; // verwijderd het product uit de winkelwagen
mysqli_query($conn2, $sql); // voert de query uit

header("Location: ../pages/shoppingCard.php"); // stuurt de gebruiker terug naar de winkelwagen pagina