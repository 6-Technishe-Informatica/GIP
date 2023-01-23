<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style/index.css">

    <title>Tech point</title>
</head>

<body>
    <header>
        <?php include '../siteParts/nav.php'; ?>

        <?php

            if ($_SESSION["useruid"] != "Manu" || $_SESSION["useruid"] != "Quinten"){
                $conn= mysqli_connect("localhost", "root", "usbw", "gip");
            }else{
                header("location: ../index.php");
            }
        ?>
    </header>
    <main id="admin">
        <h2>Voeg artikel toe</h2>

        <button id="Cpu">CPU</button>
        <button id="Gpu">GPU</button>
        <button id="Ram">RAM</button>
        <button id="Storage">Storage</button>
        <button id="Case">Case</button>
        <button id="Motherboard">Motherboard</button>
        <button id="PowerSupply">Power supply</button>
        <button id="Monitor">Monitor</button>
        <button id="Keyboard">Keyboard</button>
        <button id="Mouse">Mouse</button>
        <button id="Headset">Headset</button>

        <div class="gridSignup">
            <form action="#">
                <label for="naam">Artikel naam:</label>
                <input type="text" name="naam" id="naam" placeholder="Naam" require>

                <label for="prijs">Prijs:</label>
                <input type="number" name="prijs" id="prijs" placeholder="Prijs" require>

                <label class="noRequire" for="promotiePrijs">Promotie Prijs:</label>
                <input type="number" name="promotiePrijs" id="promotiePrijs" placeholder="Promotie prijs">

                <label for="beschrijving">Beschrijving:</label>
                <textarea name="beschrijving" id="beschrijving" cols="30" rows="10" require></textarea>

                <label for="vooraad">Vooraad:</label>
                <input type="number" name="vooraad" id="vooraad" placeholder="Vooraad" require>

                <label for="brand">Merk:</label>
                <input type="text" name="brand" id="brand" placeholder="Brand" require>

                <label class="noRequire" for="specialDeals">Special deal:</label>
                <input type="checkbox" name="specialDeals" id="specialDeals">
                
                <label class="noRequire" for="discover">discover:</label>
                <input type="checkbox" name="discover" id="discover">

                <label for="specs">Specificaties:</label>
                <select name="specs" id="specs">
                    <option value="default">No spec</option>
                    <option value="Cpu cores">Cpu cores</option>
                    <option value="Cpu speed">Cpu speed</option>
                    <option value="Cpu socket">Cpu socket</option>
                    <option value="Cpu type">Cpu type</option>

                    <option value="Read speed">Read speed</option>
                    <option value="Write speed">Write speed</option>
                    <option value="Capacity">Capacity</option>
                    <option value="Form factor">Form factor</option>

                    <option value="Ram type">Ram type</option>
                    <option value="Ram speed">Ram speed</option>
                    <option value="Ram capacity">Ram capacity</option>

                    <option value="Screen size">Screen size</option>
                    <option value="Screen resolution">Screen resolution</option>
                    <option value="Screen refresh rate">Screen refresh rate</option>
                    <option value="Screen type">Screen type</option>

                    <option value="Gpu type">Gpu type</option>
                    <option value="Gpu speed">Gpu speed</option>
                    <option value="Gpu memory">Gpu memory</option>
                    <option value="Gpu memory type">Gpu memory type</option>
                    <option value="Gpu memory speed">Gpu memory speed</option>

                    <option value="Power supply">Power supply</option>
                    <option value="Power supply type">Power supply type</option>
                    <option value="Power supply wattage">Power supply wattage</option>

                    <option value="Case type">Case type</option>
                    <option value="Case size">Case size</option>
                    <option value="Case color">Case color</option>
                    <option value="Case material">Case material</option>

                    <option value="Motherboard type">Motherboard type</option>
                    <option value="Motherboard socket">Motherboard socket</option>
                    <option value="Motherboard form factor">Motherboard form factor</option>
                    <option value="Motherboard ram type">Motherboard ram type</option>
                    <option value="Motherboard ram speed">Motherboard ram speed</option>
                    <option value="Motherboard ram capacity">Motherboard ram capacity</option>
                    <option value="Motherboard ram slots">Motherboard ram slots</option>
                    <option value="Motherboard m.2 slots">Motherboard m.2 slots</option>
                    <option value="Motherboard sata slots">Motherboard sata slots</option>
                    <option value="Motherboard pci slots">Motherboard pci slots</option>
                    <option value="Motherboard usb slots">Motherboard usb slots</option>
                    <option value="Motherboard audio">Motherboard audio</option>
                    <option value="Motherboard lan">Motherboard lan</option>
                    <option value="Motherboard wifi">Motherboard wifi</option>
                    <option value="Motherboard bluetooth">Motherboard bluetooth</option>
                    
                    <option value="Keyboard type">Keyboard type</option>
                    <option value="Keyboard backlight">Keyboard backlight</option>
                    <option value="Keyboard switch type">Keyboard switch type</option>
                    <option value="Keyboard switch color">Keyboard switch color</option>
                    <option value="Keyboard switch actuation">Keyboard switch actuation</option>
                    
                    <option value="Mouse type">Mouse type</option>
                    <option value="Mouse dpi">Mouse dpi</option>
                    <option value="Mouse buttons">Mouse buttons</option>
                    <option value="Mouse weight">Mouse weight</option>
                    <option value="Mouse cable length">Mouse cable length</option>

                    <option value="Headset type">Headset type</option>
                    <option value="Headset microphone">Headset microphone</option>
                    <option value="Headset cable length">Headset cable length</option>
                    <option value="Headset weight">Headset weight</option>
                </select>
                <input type="text" >

                <input type="submit" name="artikelSubmit" value="Artikel toevoegen">
            </form>
        </div>
    </main>
    <footer>
        <?php include '../siteParts/contact.php'; ?>
    </footer>

    <script src="../main.js"></script>
</body>

</html>