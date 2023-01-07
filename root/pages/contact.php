<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style/index.css">

    <title>Tech point</title>
</head>

<body id="contact">
    <header>
        <?php include '../siteParts/nav.php'; // includes the nav?>
    </header>
    <main id="contact">
        <h2>Contact</h2>
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

            <div class="info">
                <h3>Info: </h3>
                <p>Bevrijdingslaan 85</p>
                <p>9200 Dendermonde</p>
                <p>België</p>
            </div>
        </div>

        <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2509.4140960939844!2d4.057685616114162!3d51.026972179559195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c390b566d23141%3A0xbb9c62898d18e8b6!2sBevrijdingslaan%2085%2C%209200%20Dendermonde!5e0!3m2!1snl!2sbe!4v1672927012260!5m2!1snl!2sbe" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </main>
    <footer>
        <?php include '../siteParts/contact.php'; // includes the footer?>
    </footer>

    <script src="../main.js"></script>
</body>

</html>