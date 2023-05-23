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
        <hr>
        <p>Wij zijn te vinden in Dendermonde, België.</p>
        <div class="gridContact">
            <form id="form" action="../includes/form.inc.php" method="post">
                <label for="name">Naam</label>
                <input id="name" type="text" name="name" id="name" placeholder="Naam">
                <div class="required"></div>

                <label for="email">Email</label>
                <input id="email" type="email" name="email" id="email" placeholder="Email">
                <div class="required"></div>

                <label class="message" for="message">Bericht:</label>
                <textarea id="text" class="messageArea" name="message" id="message" cols="30" rows="10" placeholder="Bericht"></textarea>
                <div class="required"></div>

                <input type="submit" name="submit" value="Submit">
            </form>

            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2509.4842324710858!2d4.094553778023916!3d51.02567664577879!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3912d6048fc7f%3A0xbfd724b61f6cb36a!2sGO*21%20talent!5e0!3m2!1snl!2sbe!4v1682700582898!5m2!1snl!2sbe" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </main>
    <footer>
        <?php include '../siteParts/contact.php'; ?>
    </footer>

    <script src="../main.js"></script>
</body>

</html>