<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestelling ingeven</title>
</head>
<body>

<?php
  $klant = $_POST['klant'];
  $connect = mysqli_connect("localhost", "root", "usbw", "test");
  $resultaat = mysqli_query($connect, "SELECT * FROM klanten WHERE Naam = '$klant';");
  $rij = mysqli_fetch_assoc($resultaat);

  echo "<h1>klant bestellingen</h1>"
  echo "<h2> klant gegevens </h2>";
  echo "<h3>" . $rij['Naam'] . "</h3>";
  echo "<h3>" . $rij['Adres'] . "</h3>";
  echo "<h3>" . $rij['Postcode'] . "</h3>";
  echo "<h3>" . $rij['Gemeente'] . "</h3>";

  echo "<h3>Bestelling ingeven</h3>";
  $artikels = [];
  $resultaat = mysqli_query($connect, "SELECT * FROM artikels;");
  while ($rij = mysqli_fetch_assoc($resultaat)) {
    $artikels[] = $rij;
  }


  /*
  
  let artikels = [
    {
      'artikelnummer': 1,
      'omschrijving': 'test',
      'eenheidsprijs': '3.95'
    }
    ,
    {
      ...
    }
    ]

    function veranderArtikel()
    {
      let artikelnummer = document.querySelector('select[name="artikel"]').value;
      let artikel = artikels.find(artikel => artikel.artikelnummer == artikelnummer);
      document.querySelector('input[name="omschrijving"]').value = artikel.omschrijving;
      document.querySelector('input[name="eenheidsprijs"]').value = artikel.eenheidsprijs;
    } 
  */ 

  $num_A = count($artikels);
  $num_B = count($artikels[0]);
  $num_C = 0;
  foreach ($artikels as $artikel) {
    $tel_A++;
    $tel_B = 0;
    foreach ($artikel as $key => $value) {
      $tel_B++;
      echo "'" . $key . "': '" . $value . "'";
      if ($tel_B < $num_B) {
        echo ", ";
      }
      echo "}";
      if ($tel_A < $num_A) {
        echo ", ";
      }
    }
  }
  echo "<script>";
  echo "let artikels = [";
  echo "{";
    
  echo "</script>";
?>

    <form action="opslaan.php" method="POST">
        <input type="hidden" name="klant" value="<?php echo $klant; ?>" /><br/>
        Artikel: <select name="artikel" onChange="veranderArtikel()">
<?php
  foreach($artikels as $artikel) {
    echo "<option value='".$artikel['ArtikelNummer']."'>".$artikel['ArtikelNummer']."</option>";
  }
?>           

        </select>
        Omschrijving:  <input type="text" value="<?php echo $artikels[0]['Omschrijving']; ?>"/>
        Eenheidsprijs: <input type="text" value="<?php echo $artikels[0]['Eenheidsprijs']; ?>"/><br/>
        Aantal besteld: <input type="number" step="0.001" name="aantal"/>
        Datum bestelling: <input typ="Date" name="datum"/>
        <input type="submit" value="Bestelling opslaan"/>
    </form>

</body>
</html>