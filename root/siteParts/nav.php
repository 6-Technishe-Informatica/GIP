<?php
session_start();
?>

<nav>
    <h2>
        <a href="../index.php" class="logo"> Tech <span>Point</span></a>
    </h2>

    <img id="burger" src="../images/burger.svg" alt="burger menu">

    <ul id="navLinks">

        <?php
        //check if the page is artikelen.php
        $paginaNaam =  basename($_SERVER['PHP_SELF']); //geeft pagina naam weer

        if ($paginaNaam != "artikelen.php") {
            echo "<li class='search'><input type='text' id='myInput' onkeyup='myFunction()' onclick='hide()' placeholder='Search for artikelen..'></li>";
        }

        ?>
        <li class="nav-item"><a href="../pages/artikelen.php" class="underline-hover-effect">Artikelen</a></li>
        <li class="nav-item"><a href="../pages/contact.php" class="underline-hover-effect">Contact</a></li>
        <?php
        if (isset($_SESSION["useruid"])) { // check if user is logged in
            if ($_SESSION["admin"] == 1) { // check if user is admin
                echo "<li class='nav-item' ><a href='../pages/admin.php' class='underline-hover-effect'>Admin</a></li>";
            } else {
                echo "<li class='nav-item' ><a href='../pages/profile.php' class='underline-hover-effect'>Profiel</a></li>";
            }

            echo "<li class='nav-item' ><a href='../includes/logout.inc.php' class='underline-hover-effect'>Log uit</a></li>";
        } else { // if user is not logged in
            echo "<li class='nav-item' ><a href='../pages/signup.php' class='underline-hover-effect'>Registreer</a></li>";
            echo "<li class='nav-item' ><a href='../pages/login.php' class='underline-hover-effect'>Log in</a></li>";
        }
        ?>
        <li><a href="../pages/shoppingCard.php"><img width="20px" height="20px" src="../images/winkelwagen.svg" alt="winkelwagen"></a></li>
    </ul>
</nav>
<hr>

<table id="myTable">
    <tr class="header">
        <th style="width:60%;">Name</th>
        <th style="width:40%;">Prijs</th>
    </tr>
</table>

<script src="../siteparts/search.js"></script>