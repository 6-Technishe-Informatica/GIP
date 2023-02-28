<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klant kiezen</title>
</head>
<body>
    <h1>Klant bestellingen</h1>
    <h3>Keuze klant</h3>
    <form action="bestelling.php" method="POST">
        <select name="klant">
            <?php
            $connect = mysqli_connect("localhost", "root", "usbw", "test");
            $resultaat = mysqli_query($connect, "SELECT * FROM klant ORDER BY Naam;");
            while ($rij = mysqli_fetch_assoc($resultaat)) {
                echo "<option value='". $rij['Naam'] ."'>" . $rij['Naam'] . "</option>";
            }
            ?>            
        </select>
        <input type="submit" value="Doorgaan met klant"/>
    </form>
</body>
</html>