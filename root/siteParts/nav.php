<?php
    session_start();
?>

<nav>
        <!-- <li><a href=""><img src="../images/burger.svg" alt="burger menu"></a></li> -->
    <h2>
        <a href="../index.php" class="logo"> Tech <span>Point</span></a>
    </h2>
    <ul>
    <li><input type="text" id="myInput" onkeyup="myFunction()" onclick="hide()" placeholder="Search for artikelen.."></li>
        <li class="nav-item" ><a href="about.php" class="underline-hover-effect">About</a></li>
        <li class="nav-item" ><a href="../pages/contact.php" class="underline-hover-effect">Contact</a></li>
        <?php
            if(isset($_SESSION["useruid"])){
                echo "<li class='nav-item' ><a href='../pages/profile.php' class='underline-hover-effect'>Profiel</a></li>";
                echo "<li class='nav-item' ><a href='../includes/logout.inc.php' class='underline-hover-effect'>Log uit</a></li>";
            }
            else{
                echo "<li class='nav-item' ><a href='../pages/signup.php' class='underline-hover-effect'>Registreer</a></li>";
                echo "<li class='nav-item' ><a href='../pages/login.php' class='underline-hover-effect'>Log in</a></li>";
            }
        ?>
        <li><a href="#"><img src="../images/winkelwagen.svg" alt="winkelwagen"></a></li>
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