<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style/index.css">

    <title>Tech point</title>
</head>

<body id="contact">
    <header>
        <?php include '../siteParts/nav.php'; ?>
    </header>
    <main id="contact">
        <h2>Laat een bericht achter</h2>
        <p>Wij zijn te vinden in Dendermonde, België.</p>

        <div class="gridContact">
            <form id="form" action="#" method="get">
                <label for="name">Naam</label>
                <input id="name" type="text" name="name" id="name" placeholder="Naam">
                <div class="required"></div>

                <label for="email">Email</label>
                <input id="email" type="email" name="email" id="email" placeholder="Email">
                <div class="required"></div>

                <label class="message" for="message">Bericht:</label>
                <textarea id="text" class="messageArea" name="message" id="message" cols="30" rows="10" placeholder="Bericht"></textarea>
                <div class="required"></div>

                <input type="submit" value="Verzenden">
            </form>

            <div class="map">
                <img src="../images/form.jpg" alt="#">
            </div>
        </div>
    </main>
    <footer>
        <?php include '../siteParts/contact.php'; ?>
    </footer>

    <script src="../main.js"></script>
</body>

</html>