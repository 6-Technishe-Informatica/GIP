<?php
include 'dbh.inc.php';

$referentieNummer = $_GET['referentieNummer'];
$klantNummer = $_GET['klantNummer'];

//delete product from shopping card
$sql = "DELETE FROM winkelwagen WHERE referentieNummer = $referentieNummer AND klantNummer = $klantNummer";
mysqli_query($conn2, $sql);

//redirect to shopping card
header("Location: ../pages/shoppingCard.php");