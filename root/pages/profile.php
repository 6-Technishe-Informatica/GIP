<?php
session_start(); // start session
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style/index.css">

    <title>Tech point</title>
</head>

<body>
    <header>
        <?php include '../siteParts/nav.php'; // includes nav bar 
        ?>
    </header>
    <main>
        
    <h3>ABOUT</h3>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus distinctio sint qui nulla similique iure dolorum! Reprehenderit sed minus ipsam ratione aliquam delectus voluptatem consequuntur eius! Dolore dolores hic corporis.</p>

    <h3>hallo, ik ben gebruiker...</h3>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam maiores exercitationem tenetur. Mollitia quos praesentium quia libero, doloremque deleniti voluptatum ab obcaecati officia qui esse incidunt earum magni nulla vero!</p>


    </main>
    <footer>
        <?php include '../siteParts/contact.php'; // includes footer
        ?>
    </footer>
</body>

</html>