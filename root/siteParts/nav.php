<?php
session_start();
?>

<nav>
    <h2>
        <a href="../index.php" class="logo"> Tech <span>Point</span></a>
    </h2>

    <img id="burger" src="../images/burger.svg" alt="burger menu"> <!-- toont de burger menu knop -->

    <ul id="navLinks">

        <?php
        //kijk of de pagina artikelen.php
        $paginaNaam =  basename($_SERVER['PHP_SELF']); //geeft pagina naam weer

        if ($paginaNaam != "artikelen.php") { //checkt of de pagina niet artikelen.php is
            echo "<li class='search'><input type='text' id='myInput' onkeyup='myFunction()' onclick='hide()' placeholder='Search for artikelen..'></li>"; //toont de zoekbalk
        }

        ?>
        <li class="nav-item"><a href="../pages/artikelen.php" class="underline-hover-effect">Artikelen</a></li> <!-- toont de artikelen pagina -->
        <li class="nav-item"><a href="../pages/contact.php" class="underline-hover-effect">Contact</a></li> <!-- toont de contact pagina -->
        <?php
        if (isset($_SESSION["useruid"])) { //checkt of de gebruiker is ingelogd
            if ($_SESSION["admin"] == 1) { //checkt of de gebruiker een admin is
                echo "<li class='nav-item' ><a href='../pages/admin.php' class='underline-hover-effect'>Admin</a></li>"; //toont de admin pagina
            } else {
                echo "<li class='nav-item' ><a href='../pages/profile.php' class='underline-hover-effect'>Profiel</a></li>"; //toont de profiel pagina
            }

            echo "<li class='nav-item' ><a href='../includes/logout.inc.php' class='underline-hover-effect'>Log uit</a></li>"; //toont de log uit knop
        } else { 
            echo "<li class='nav-item' ><a href='../pages/signup.php' class='underline-hover-effect'>Registreer</a></li>"; //toont de registreer knop
            echo "<li class='nav-item' ><a href='../pages/login.php' class='underline-hover-effect'>Log in</a></li>"; //toont de log in knop
        } 
        ?>
        <li><a href="../pages/shoppingCard.php"><img width="20px" height="20px" src="../images/winkelwagen.svg" alt="winkelwagen"></a></li> <!-- toont de winkelwagen -->
    </ul>
</nav>
<hr>

<table id="myTable"> 
    <tr class="header">
        <th style="width:60%;">Name</th>
        <th style="width:40%;">Prijs</th>
    </tr>
</table>

<script src="../siteparts/search.js"></script> <!-- voegt de zoekbalk toe -->